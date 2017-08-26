<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Generator shorten URL link">
    <title>@yield('title')</title>
    @stack('style')
</head>
<body>
    <div class="wrapper">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>