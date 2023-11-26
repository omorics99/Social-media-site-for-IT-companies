<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chat Laravel Pusher | Edlin App</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- End JavaScript -->
    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- End CSS -->

</head>

<body>
<nav class="bg-black border-b-4 border-green-800">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <img src="{{ URL('plain.png') }}" class="h-8 mr-3" alt="Zenvue Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Zenvue</span>
        </a>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 bg-black md:flex-row md:space-x-8 md:mt-0 md:border-0">
                <li>
                    <a href="/companies" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Uzņēmumi</a>
                </li>
                <li>
                    <a href="/products" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Produkti</a>
                </li>
                <li>
                    <a href="/chat" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Čats</a>
                </li>
                <li>
                    <a href="/calendar/events" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kalendārs</a>
                </li>
                <li>
                    <a href="/search" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Meklēšana</a>
                </li>
                <li>
                    <a href="/register" class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Rēģistrācija</a>
                </li>
                <li>
                    <a href="/login" class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-600 ml-auto">Pieslēgties</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="chat">

    <!-- Header -->
    <div class="top">
        <img src="https://picsum.photos/id/237/100" alt="Avatar">
        <div>
            <p>User</p>
            <small>Online</small>
        </div>
    </div>
    <!-- End Header -->

    <!-- Chat -->
    <div class="messages">
        @include('receive', ['message' => "Write new message!"])
    </div>
    <!-- End Chat -->

    <!-- Footer -->
    <div class="bottom">
        <form>
            <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
            <button type="submit"></button>
        </form>
    </div>
    <!-- End Footer -->

</div>
<footer class="bg-black border-t-4 border-green-800">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
                <img src="{{ URL('plain.png') }}" class="h-8 mr-3" alt="Zenvue Logo" />
                <h2 class="text-white text-lg">HatchUp</h2>
            </a>
        </div>
    </div>
</footer>
</body>

<script>
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
    const channel = pusher.subscribe('public');

    //Receive messages
    channel.bind('chat', function (data) {
        $.post("/receive", {
            _token:  '{{csrf_token()}}',
            message: data.message,
        })
            .done(function (res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            });
    });

    //Broadcast messages
    $("form").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url:     "/broadcast",
            method:  'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data:    {
                _token:  '{{csrf_token()}}',
                message: $("form #message").val(),
            }
        }).done(function (res) {
            $(".messages > .message").last().after(res);
            $("form #message").val('');
            $(document).scrollTop($(document).height());
        });
    });

</script>
</html>
