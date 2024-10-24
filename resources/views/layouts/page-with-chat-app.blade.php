{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yellow Theme Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    
    <link rel="stylesheet" href={{asset("css/chat-page.css")}}>
    <script src={{asset("js/chat-page.js")}}></script>
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">YellowTheme</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer bg-warning">
        <p>&copy; 2024 YellowTheme. All Rights Reserved.</p>
    </div>

    <!-- Popup Chat Button -->
    <button class="open-button">
        <img src="{{asset('storage/img/bot.png')}}" alt="User Profile">
        <h6>Chat</h6>
    </button>

    <!-- Popup Chatbox -->
    <div class="chat-popup" id="chatPopup">
        <div class="chat-container" id="chatContainer">
            <!-- Chat Header with User's Profile -->
            <div class="chat-header">
                <img src="{{asset('storage/img/bot.png')}}" alt="User Profile">
                <div>
                    <h6>Bro Bot</h6>
                    <span class="status">Always Online</span>
                </div>
            </div>
            <!-- Chat Content -->
            <div id="chat-window" class="mb-2">
                <div id="output"></div>
            </div>
            <!-- Chat Options -->
            <div id="button-container">
                <!-- Buttons will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <!-- Include compiled JS -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
