@extends('layouts.default')

@section('content')

    @foreach($evaluations as $evaluation)
        <div class="w-full" style="border: 1px solid blue">
            {{ $evaluation->comment }} <br>
            <img class="company-logo" src="data:image/png;base64, {{ $evaluation->companyLogo }}"> <br>
            {{ $evaluation->categoryName }} <br>
            {{ $evaluation->grade }}/5 <br>
            @if($evaluation->thread)
                <button onclick="toggleThread({{ $evaluation->id }});">Ver/esconder conversa</button>
                <div class="hidden" id="thread-{{ $evaluation->id }}">
                    @foreach($evaluation->thread as $comment)
                        <span style="padding-left: {{ $comment->depth }}em">
                        {{ $comment->comment }}
                    </span>
                        <button onclick="openForm();" title="Responder comentário">↰</button>
                        <form style="padding-left: {{ $comment->depth }}em" action="/comment/{{ $comment->id }}"
                              method="POST">
                            @csrf
                            <input name="answer">
                            <button>Responder</button>
                        </form>
                        <br>
                    @endforeach
                </div>
            @endif
        </div>
        <br>
    @endforeach

@stop

<script>

    function toggleThread(evaluationId) {
        $('#thread-' + evaluationId).toggleClass('hidden')
    }

</script>

<style>

    .company-logo {
        width: 10%;
        max-width: 75px;
    }

</style>
