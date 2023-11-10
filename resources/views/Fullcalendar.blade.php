<!DOCTYPE html>
<html>
<head>
    <title>Kalendārs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .author-label {
            margin-bottom: 10px;
            font-weight: normal;
        }

        .followers-label {
            margin-bottom: 10px;
            font-weight: normal;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .modal-content input,
        .modal-content button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="container mx-auto">
        <div class="bg-gray-200 p-4 text-center mb-4">
            <h3 class="text-lg font-bold">Kalendārs</h3>
        </div>
        <button id="createEventButton" class="bg-blue-500 text-white font-bold py-2 px-4 rounded mb-4">
            Create Event
        </button>
        <div id='calendar' class="bg-white p-4 rounded-lg shadow"></div>
        <div id="eventForm" class="modal">
            <div class="modal-content">
                <form id="formContent">
                    <input type="text" id="eventTitle" placeholder="Event Title" class="border border-gray-300 rounded p-2 block w-full">
                    <input type="text" id="eventDescription" placeholder="Event Description" class="border border-gray-300 rounded p-2 block w-full">
                    <input type="datetime-local" id="eventDate" class="eventDateTime border border-gray-300 rounded p-2 block w-full">
                    <input type="datetime-local" id="eventEndDate" class="eventDateTime border border-gray-300 rounded p-2 block w-full">
                    <input type="text" id="eventLocation" placeholder="Event Location" class="border border-gray-300 rounded p-2 block w-full">
                    <span class="author-label" id="eventAuthor"></span>
                    <span class="followers-label" id="eventFollowers"></span>
                    <div class="button-container">
                        <button type="button" id="followEvent" class="bg-blue-500 text-white font-bold py-2 px-4 rounded ml-2">
                            Follow
                        </button>
                        <button type="button" id="saveEvent" class="bg-green-500 text-white font-bold py-2 px-4 rounded ml-2" style="display: none;">
                            Save
                        </button>
                        <button type="button" id="deleteEvent" class="bg-red-500 text-white font-bold py-2 px-4 rounded ml-2" style="display: none;">
                            Delete
                        </button>
                        <button type="button" id="cancelEditEvent" class="bg-gray-500 text-white font-bold py-2 px-4 rounded ml-2">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add a hidden input field to store the currently logged-in user's ID -->
    <input type="hidden" id="loggedInUserId" value="{{ Auth::user()->id }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
$(document).ready(function() {
    var SITEURL = "{{ url('/') }}";
    var followedEvents = [];
    var loggedInUserId = $("#loggedInUserId").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add event deletion handling
    $('#deleteEvent').off('click').on('click', function() {
    var eventId = $('#eventForm').data('event-id');
    deleteEvent(eventId);
    });

    fetchFollowedEvents();

    // ... existing event handlers ...

    function fetchFollowedEvents() {
        $.ajax({
            url: SITEURL + "/user-followed-events",
            type: "GET",
            success: function(data) {
                followedEvents = data; // Update the array with the fetched data
            },
            error: function(error) {
                console.error("Error fetching followed events: ", error);
            }
        });
    }
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        editable: true,
        events: SITEURL + "/calendar/events",
        displayEventTime: false,
        selectable: true,
        selectHelper: true,
        
        select: function(start, end) {
            // Format the dates correctly
            var startDate = moment(start).format('YYYY-MM-DD[T]HH:mm');
            var endDate = moment(end).subtract(1, 'seconds').format('YYYY-MM-DD[T]HH:mm');
            console.log("Formatted Start Date: ", startDate);
            console.log("Formatted End Date: ", endDate);
            // Set the formatted dates into the datetime-local inputs
            $('#eventDate').val(startDate);
            $('#eventEndDate').val(endDate);

            // Clear other fields and show the modal
            $('#eventTitle').val('');
            $('#eventDescription').val('');
            $('#eventLocation').val('');
            $('#eventAuthor').text('');
            $('#eventFollowers').text('');
            $('#saveEvent').show();
            $('#deleteEvent').hide();
            $('#eventForm').css('display', 'block');
        },


        eventDrop: function(event, delta, revertFunc) {
            var start = event.start.format('YYYY-MM-DDTHH:mm');
            var end = event.end.format('YYYY-MM-DDTHH:mm');
            updateEvent(event.id, start, end, event.title);
        },
        eventClick: function(event) {
            var isUserEventCreator = (event.user_id == loggedInUserId);

            // Show the event form modal
            $('#eventForm').css('display', 'block');
            $('#eventForm').data('event-id', event.id);
            // Populate the form fields with event data
            $('#eventTitle').val(event.title);
            $('#eventDescription').val(event.description);
            $('#eventLocation').val(event.location);

            // Format the dates for datetime-local input
            var formattedStart = moment(event.start).format('YYYY-MM-DD[T]HH:mm');
            var formattedEnd = moment(event.end).format('YYYY-MM-DD[T]HH:mm');

            $('#eventDate').val(formattedStart);
            $('#eventEndDate').val(formattedEnd);

            // Load author information and event followers
            loadEventAuthor(event.id);
            showEventFollowers(event.id);

            // Check if the user is the event creator
            if (isUserEventCreator) {
                // User is the creator: enable editing
                $('#saveEvent').show();
                $('#deleteEvent').show();
                $('#eventTitle').prop('readonly', false);
                $('#eventDescription').prop('readonly', false);
                $('#eventDate').prop('readonly', false);
                $('#eventEndDate').prop('readonly', false);
                $('#eventLocation').prop('readonly', false);
            } else {
                // User is not the creator: disable editing
                $('#saveEvent').hide();
                $('#deleteEvent').hide();
                $('#eventTitle').prop('readonly', true);
                $('#eventDescription').prop('readonly', true);
                $('#eventDate').prop('readonly', true);
                $('#eventEndDate').prop('readonly', true);
                $('#eventLocation').prop('readonly', true);
            }

            // Update follow/unfollow button text
            var isFollowed = followedEvents.includes(event.id);
            $('#followEvent').data('event-id', event.id).text(isFollowed ? 'Unfollow' : 'Follow');
        }
        });

            $('#createEventButton').on('click', function() {
            // Clear all input fields
            $('#eventTitle').val('');
            $('#eventDescription').val('');
            $('#eventDate').val('');
            $('#eventEndDate').val('');
            $('#eventLocation').val('');

            // Reset any labels or state
            $('#eventAuthor').text('');
            $('#eventFollowers').text('');

            // Show all relevant buttons and hide others
            $('#saveEvent').show();
            $('#deleteEvent').hide(); // Hide delete as it's not relevant for new event

            // Display the event form modal
            $('#eventForm').css('display', 'block');
            });

            $('#saveEvent').on('click', function() {
                createOrUpdateEvent();
            });

            $('#cancelEditEvent').on('click', function() {
            $('#eventForm').css('display', 'none');
            $('#eventForm').removeData('event-id'); // Clear event ID
            });
            

    // Delegated event handling for follow/unfollow button
    $(document).on('click', '#followEvent', function() {
        var eventId = $(this).data('event-id');
        if (followedEvents.includes(eventId)) {
            unfollowEvent(eventId);
        } else {
            followEvent(eventId);
        }
    });

    function createOrUpdateEvent() {
        var eventId = $('#eventForm').data('event-id'); // Get the event ID
        var title = $('#eventTitle').val();
        var description = $('#eventDescription').val();
        var start = new Date($('#eventDate').val()).toISOString();
        var end = new Date($('#eventEndDate').val()).toISOString();
        var location = $('#eventLocation').val();

        // Check if this is a new event or an update
        if (eventId) {
            // Update existing event
            $.ajax({
                url: SITEURL + "/fullcalendar-ajax",
                data: {
                    id: eventId,
                    title: title,
                    description: description,
                    start: start,
                    end: end,
                    location: location,
                    type: 'update'
                },
                type: "POST",
                success: function(data) {
                    $('#eventForm').css('display', 'none');
                    calendar.fullCalendar('refetchEvents');
                    toastr.success("Event Updated Successfully", 'Event');
                },
                error: function() {
                    toastr.error('Failed to update the event', 'Event Update Failed');
                }
            });
        } else {
            // Create new event
            $.ajax({
                url: SITEURL + "/fullcalendar-ajax",
                data: {
                    title: title,
                    description: description,
                    start: start,
                    end: end,
                    location: location,
                    type: 'add'
                },
                type: "POST",
                success: function(data) {
                $('#eventForm').css('display', 'none');
                $('#eventForm').removeData('event-id'); // Clear event ID
                calendar.fullCalendar('refetchEvents');
                toastr.success("Event Created Successfully", 'Event');
                },
                error: function() {
                    toastr.error('Failed to create the event', 'Event Creation Failed');
                }
            });
        }
    }
    

    function updateEvent(eventId, start, end, title) {
        $.ajax({
            url: SITEURL + "/fullcalendar-ajax",
            data: {
                id: eventId,
                start: start,
                end: end,
                title: title,
                type: 'update'
            },
            type: "POST",
            success: function(data) {
                toastr.success("Event Updated Successfully", 'Event');
            },
            error: function() {
                toastr.error('Failed to update the event', 'Event Update Failed');
            }
        });
    }
    function deleteEvent(eventId) {
        if (!confirm("Are you sure you want to delete this event?")) {
            return; // Stop if not confirmed
        }

        $.ajax({
            url: SITEURL + "/fullcalendar-ajax",
            type: "POST",
            data: {
                id: eventId,  // Ensure the event ID is being sent
                type: 'delete'
            },
            success: function(response) {
                $('#eventForm').css('display', 'none');
                calendar.fullCalendar('refetchEvents');
                toastr.success("Event Deleted Successfully", 'Event');
            },
            error: function(xhr) {
                toastr.error('Failed to delete the event. Error: ' + xhr.responseText, 'Event Deletion Failed');
            }
        });
    }
    

    function followEvent(eventId) {
        $.ajax({
            url: SITEURL + "/follow-event",
            type: "POST",
            data: {
                event_id: eventId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (!followedEvents.includes(eventId)) {
                    followedEvents.push(eventId); // Add eventId to the array
                }
                $('#followEvent').text('Unfollow'); // Update button text
            },
            error: function(xhr, status, error) {
                console.error("Error - Status:", status, "Message:", error, "Response:", xhr.responseText);
                // Error handling
            }
        });
    }

    function unfollowEvent(eventId) {
        $.ajax({
            url: SITEURL + "/unfollow-event",
            type: "POST",
            data: {
                event_id: eventId
            },
            success: function(data) {
                followedEvents = followedEvents.filter(id => id !== eventId); // Remove eventId from the array
                $('#followEvent').text('Follow'); // Update the button text
                // ... other success handling ...
            },
            error: function() {
                toastr.error('Failed to unfollow the event', 'Event Unfollow Failed');
            }
        });
    }

    function loadEventAuthor(eventId) {
        $.ajax({
            url: SITEURL + "/calendar/getAuthor/" + eventId,
            type: "GET",
            success: function(data) {
                if (data.author) {
                    $('#eventAuthor').text("Author: " + data.author.name);
                } else {
                    $('#eventAuthor').text("Author: Unknown");
                }
            },
            error: function() {
                $('#eventAuthor').text("Author: Unknown");
            }
        });
    }

    function showEventFollowers(eventId) {
        $.ajax({
            url: SITEURL + "/calendar/getAuthor/" + eventId,
            type: "GET",
            success: function(data) {
                if (data.event && data.event.followers) {
                    var followerCount = data.event.followers.length;
                    $('#eventFollowers').text("Follower Count: " + followerCount);
                } else {
                    $('#eventFollowers').text("Follower Count: 0");
                }
            },
            error: function() {
                $('#eventFollowers').text("Failed to load follower count");
            }
        });
    }
});

</script>
</body>
</html>
