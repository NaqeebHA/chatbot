<!-- In resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debt Chatbot</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <!-- Include the reusable header -->
    @include('components.header')

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Include compiled JS -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
