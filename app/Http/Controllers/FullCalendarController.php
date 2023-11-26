<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\AuthorizationException;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->with('user:id,name,email') // Load user information
                ->get(['id', 'title', 'description', 'start', 'location', 'end', 'user_id']); // Include user_id in the response

            return response()->json($data);
        }

        return view('fullcalendar');
    }
    
    public function followedEvents(Request $request)
    {
        $user = $request->user(); // Assuming you're using Laravel's built-in authentication

        // Fetch events the user is following
        $followedEvents = $user->events()->get(); // Adjust this as per your relationship setup

        return response()->json($followedEvents);
    }

    public function followEvent(Request $request)
    {
        Log::info('Received followEvent request', ['event_id' => $request->event_id]);
        $event = Event::find($request->event_id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        // Check if the user is already following the event
        $user = auth()->user();
        if ($user->eventsFollowed->contains($event)) {
            return response()->json(['error' => 'User is already following the event'], 400);
        }

        // Add the user as a follower
        $user->eventsFollowed()->attach($event);

        return response()->json(['message' => 'Event followed successfully']);
    }

    public function unfollowEvent(Request $request)
    {
        $event = Event::find($request->event_id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        // Remove the user as a follower
        $user = auth()->user();
        $user->eventsFollowed()->detach($event);

        return response()->json(['message' => 'Event unfollowed successfully']);
    }
    public function getAuthor($eventId)
    {
        // Fetch the author information based on the event ID
        $event = Event::find($eventId);

        if ($event) {
            // Load the author relationship
            $author = $event->user;

            // Check if the author is available
            if ($author) {
                return response()->json(['author' => $author]);
            } else {
                return response()->json(['author' => null]);
            }
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }

    public function getUserFollowedEvents()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $followedEvents = $user->eventsFollowed()->pluck('id'); // Assuming 'eventsFollowed' is the correct relationship name

        return response()->json($followedEvents);
    }

    public function ajax(Request $request)
    {
        try {
            DB::beginTransaction();

            switch ($request->type) {
                case 'add':
                    $validated = $request->validate([
                        'title' => 'required',
                        'description' => 'required',
                        'start' => 'required|date',
                        'location' => 'required',
                        'end' => 'required|date|after_or_equal:start',
                    ]);

                    $user = Auth::user(); // Get the currently authenticated user
                    $event = new Event($validated);
                    $event->user_id = $user->id; // Assign the user ID to the event

                    $event->save();
                    Log::info('Event saved', ['event_id' => $event->id]);
                    DB::commit();

                    return response()->json($event, 201);

                case 'update':
                        $validated = $request->validate([
                            'id' => 'required|exists:events,id',
                            'title' => 'required',
                            'description' => 'required',
                            'location' => 'required',
                            'start' => 'required|date',
                            'end' => 'required|date|after_or_equal:start',
                        ]);

                    $event = Event::find($validated['id']);

                    // Check if the currently authenticated user is the author of the event
                    if (Auth::user()->id !== $event->user_id) {
                        throw new AuthorizationException('You are not authorized to update this event');
                    }

                    $updated = $event->update($validated);
                    Log::info('Event update status', ['updated' => $updated]);

                    if ($updated) {
                        DB::commit();
                        return response()->json(['message' => 'Event updated successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['message' => 'Event not found'], 404);
                    }

                case 'delete':
                    $validated = $request->validate([
                        'id' => 'required|exists:events,id',
                    ]);

                    $event = Event::find($validated['id']);

                    // Check if the currently authenticated user is the author of the event
                    if (Auth::user()->id !== $event->user_id) {
                        throw new AuthorizationException('You are not authorized to delete this event');
                    }

                    $deleted = Event::destroy($validated['id']);

                    if ($deleted) {
                        DB::commit();
                        return response()->json(['message' => 'Event deleted successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['message' => 'Event not found'], 404);
                    }

                default:
                    return response()->json(['message' => 'Invalid action type'], 400);
            }
        } catch (AuthorizationException $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 403); // Forbidden
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in FullCalendarController: ' . $e->getMessage());
            return response()->json(['message' => 'Server Error'], 500);
        }
    }
}
    