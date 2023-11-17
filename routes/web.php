<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/calendar/events', function () {
    return Inertia::render('calendar');
});
Route::post('/follow-event', [FullCalendarController::class, 'followEvent']);
Route::post('/unfollow-event', [FullCalendarController::class, 'unfollowEvent'])->name('unfollow.event');
Route::middleware('auth')->get('/calendar/followedEvents',  [FullCalendarController::class, 'getFollowerCount'])->name('followedEvents');
Route::get('/calendar/events', [FullCalendarController::class, 'index']);
Route::post('/fullcalendar-ajax', [FullCalendarController::class, 'ajax']);
Route::get('/calendar/getAuthor/{eventId}', [FullCalendarController::class, 'getAuthor']);
Route::post('/company/create/event ',function(){
    return Inertia::render('calendar');
})->middleware(['auth', 'verified'])->name('/calendar');
Route::post('/company/create/post ',function(){
    return Inertia::render('xxxxx');
})->middleware(['auth', 'verified'])->name('xxxx');
Route::get('/user-followed-events', [FullCalendarController::class, 'getUserFollowedEvents']);
Route::get('/news', function () {
    return Inertia::render('NewsFeed');
});
Route::get('/news', [NewsController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
