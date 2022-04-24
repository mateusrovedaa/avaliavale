<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased h-full">
            {{ $slot }}
        </div>
    </body>
</html>

<style>

    body {
        background-color: #EBF6FF;
    }

    html, body {
        height: 100%;
    }

    input {
        background-color: #EBF6FF !important;
        border: 0 !important;
        outline: 0 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        border-bottom: 2px solid #90CDFF !important;
    }

    input:focus {
        outline: none !important;
    }

    #login-title {
        font-size: 35px;
    }

    #auth-button {
        background-color: #83C7FF;
        text-align: center;
        border-radius: 5px;
        color: white;
        height: 50px;
    }

    #auth-link {
        color: #90CDFF;
        font-size: 18px;
    }

</style>
