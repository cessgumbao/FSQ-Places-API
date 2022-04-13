<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
        <title>Welcome to Japan - Endless Discovery</title>
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <link
        href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        rel="stylesheet"
        />
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
        rel="stylesheet"
        />
    </head>
    <body>
        <div id="app"></div>
        <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>