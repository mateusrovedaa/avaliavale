@extends('layouts.default')

@section('content')

    <div id="main-content">
        <h1><b>Avaliando {{ $company->name }}</b></h1>

        <form method="post" action="/evaluations">
            @csrf
            <input type="hidden" name="company_id" value="{{ $company->id }}">

            <input
                name="comment"
                class="w-full input-av"
                placeholder="Comentário sobre a empresa/avaliação"
                required
            >

            @foreach($company->questions as $question)
                @if($question->type === 'text')
                    <textarea
                        name="answer[{{ $question->id }}]"
                        class="w-full textarea-av"
                        placeholder="Comentário sobre a empresa/avaliação"
                        required
                    ></textarea>
                @elseif($question->type === 'number')
                    <label>{{ $question->name }}</label>
                    @for($i = 1; $i <= 5; $i++)
                        <br>
                        <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $i }}">
                        <label>{{ $i }}</label>
                    @endfor
                @else
                    <label>{{ $question->name }}</label>
                    @foreach($question->valid_answers as $validAnwser)
                        <br>
                        <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $validAnwser }}">
                        <label>{{ ucwords($validAnwser) }}</label>
                    @endforeach
                @endif
                <br><br>
            @endforeach

            <label>Nota</label>
            <br> <input required type="radio" name="grade" value="5"><label>5</label>
            <br> <input required type="radio" name="grade" value="4"><label>4</label>
            <br> <input required type="radio" name="grade" value="3"><label>3</label>
            <br> <input required type="radio" name="grade" value="2"><label>2</label>
            <br> <input required type="radio" name="grade" value="1"><label>1</label>
            <br>

            <div class="form-buttons">
                <button onclick="history.back()" type="button" class="form-button-av back-button">Voltar</button>
                <button type="submit" class="form-button-av save-button">Enviar avaliação</button>
            </div>
        </form>

    </div>

@stop
