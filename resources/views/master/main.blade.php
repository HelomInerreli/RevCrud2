<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RevExame</title>

    <link href="{!! asset('css/app.css') !!}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>

<body>

    @component('master.header')
    @endcomponent

    <main class="p-5">
        <div class="container">
            <br>
            @yield('content')
        </div>
    </main>

    @component('master.footer')
    @endcomponent

    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>
