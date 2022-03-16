<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titler')</title>
   @include('web.layout.style')
   @stack('styles')
</head>
<body>
<div class="headera">
    <div class="containera">
        @include('web.layout.header')
       @yield('head2')
    </div>
</div>

@yield('content')

@include('web.layout.footer')


@include('web.layout.script')
@yield('scripts')
</body>
</html>