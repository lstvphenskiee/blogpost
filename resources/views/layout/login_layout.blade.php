<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/824d7886d2.js" crossorigin="anonymous"></script>

    @vite(['resources/css/loginRegister.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')
</body>
</html>