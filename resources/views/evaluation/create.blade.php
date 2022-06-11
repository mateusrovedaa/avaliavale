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
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <div class="flex items-center" style="flex-flow: wrap;">
        <div class="flex justify-center items-center" style="flex-basis: 25%;">
            <img style="margin-right: 14px" id="logo" src="{{ url('avalia-vale-logo-sem-borda.png') }}">
            <h1 style="font-size: 30px"><b>Avalia Vale</b></h1>
        </div>
        <div style="flex-basis: 50%;">
            <input id="search-bar" class="w-full">
        </div>
        <div class="w-full" style="margin-top: 25px">
            <hr style="border: 2px solid #4AABFBD4;">
        </div>
    </div>
    <div>
        <div class="flex justify-center" style="font-size: 50px">
            <h1><b>Avaliando {{ $company->name }}</b></h1>
        </div>
        <form method="post" action="/evaluations">
            @csrf
            <input type="hidden" name="company_id" value="{{ $company->id }}">

            <label>Comentário sobre a empresa/avaliação</label>
            <textarea name="comment" required></textarea>

            @foreach($company->questions as $question)
                <div class="w-full">
                    <label class="w-full">{{ $question->name }}</label>
                    @if($question->type === 'text')
                        <textarea required class="w-full" name="answer[{{ $question->id }}]"></textarea>
                    @elseif($question->type === 'number')
                        @for($i = 1; $i <= 5; $i++)
                            <div class="w-full">
                                <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $i }}">
                                <label>{{ $i }}</label>
                            </div>
                        @endfor
                    @else
                        <div class="w-full">
                        @foreach($question->valid_answers as $validAnwser)
                            <div class="w-full">
                                <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $validAnwser }}">
                                <label>{{ ucwords($validAnwser) }}</label>
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
                <br>
            @endforeach
            <div class="flex justify-center">
                <button>Enviar avaliação</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<style>

    body {
        background-color: #EBF6FF;
        margin: 52px;
    }

    html, body, #menu-bar, #content {
        height: 100%;
    }

    #logo {
        width: 77px;
    }

    #search-bar {
        border: 1px solid #4AABFB !important;
        border-radius: 10px;
        height: 41px;
    }

    button {
        background-color: #83C7FF;
        text-align: center;
        border-radius: 5px;
        padding: 10px;
        color: white;
        height: 50px;
    }

</style>
