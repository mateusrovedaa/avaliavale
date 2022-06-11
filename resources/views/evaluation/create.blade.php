<h1><b>Avaliando {{ $company->name }}</b></h1>
<form method="post" action="/evaluations">
    @csrf
    <input type="hidden" name="company_id" value="{{ $company->id }}">

    <label>Comentário sobre a empresa/avaliação</label>
    <textarea name="comment" required></textarea>
    <br>

    @foreach($company->questions as $question)
        <label>{{ $question->name }}</label>
        @if($question->type === 'text')
            <textarea required name="answer[{{ $question->id }}]"></textarea>
        @elseif($question->type === 'number')
            @for($i = 1; $i <= 5; $i++)
                <br>
                <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $i }}">
                <label>{{ $i }}</label>
            @endfor
        @else
            @foreach($question->valid_answers as $validAnwser)
                <input required type="radio" name="answer[{{ $question->id }}]" value="{{ $validAnwser }}">
                <label>{{ ucwords($validAnwser) }}</label>
            @endforeach
        @endif
        <br>
    @endforeach

    <button>Enviar avaliação</button>
</form>
