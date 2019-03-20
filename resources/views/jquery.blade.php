<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <div id="app">
            {{$id}}
            <trunghieu></trunghieu>
            <combohieu></combohieu>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>