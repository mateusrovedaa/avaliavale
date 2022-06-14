@extends('layouts.default')

@section('content')

    <div class="w-full item-line evaluations">
        @foreach($companies as $company)
            <a href="/evaluations/{{ $company->id }}" class="evaluate-button publish-button">
                <b>Avalie {{ $company->name }}</b> <img class="evaluate-company-logo" src="data:image/png;base64, {{ $company->logo }}">
            </a>
        @endforeach
    </div>
    @foreach($evaluations as $evaluation)
        <div class="w-full item-line">
            <div class="w-3/4">
                <div class="item-content">
                    <h3>
                        <b>{{ $evaluation->comment }}</b>
                        <br>
                    </h3>
                    @for($grade = 0; $grade < $evaluation->grade; $grade++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                    {!! str_repeat('<span class="fa fa-star"></span> ', 5 - $evaluation->grade) !!}
                    <span class="company-category">{{ $evaluation->categoryName }} <br></span>
                </div>
                <form action="/comment/{{ $evaluation->comment_id }}"
                      method="POST">
                    @csrf
                    <input placeholder="Escreva aqui sua resposta" class="input-av" required name="answer">
                    <button class="form-button-av answer-button">Responder</button>
                </form>
                <br>
                @if($evaluation->thread)
                    <button class="form-button-av show-thread-button" onclick="toggleThread({{ $evaluation->id }});">
                        Ver/esconder conversa
                    </button>
                    <div class="hidden" id="thread-{{ $evaluation->id }}">
                        @foreach($evaluation->thread as $comment)
                            <div class="thread-comment">
                                <div style="padding-left: {{ ($comment->depth - 1) * 2 }}em">
                                    <span class="comment">
                                        <b>{{ $comment->comment }}</b>
                                    </span>
                                </div>
                                <form style="padding-left: {{ ($comment->depth - 1) * 2 }}em"
                                      action="/comment/{{ $comment->id }}"
                                      method="POST">
                                    @csrf
                                    <input class="input-av" placeholder="Escreva aqui sua resposta" required
                                           name="answer">
                                    <button class="answer-button">Responder</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="w-1/4 div-company-logo">
                <img class="company-logo" src="data:image/png;base64, {{ $evaluation->companyLogo }}"> <br>
            </div>
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

    .div-company-logo {
        display: flex;
        justify-content: flex-end;
    }

    .item-content {
        margin-bottom: 20px;
    }

    .company-logo {
        max-height: 100px;
        border-radius: 50%;
    }

    .evaluate-company-logo {
        max-height: 50px;
        max-width: 50px;
        border-radius: 50%;
    }

    .company-category {
        background-color: #D6BC61;
        color: rgba(0, 0, 0, 0.47);
        padding: 5px;
        border-radius: 15px;
    }

    .checked {
        color: orange;
    }

    .answer-button {
        background-color: #75CC77 !important;
        border-radius: 15px;
        color: white;
        width: 140px;
        padding: 5px 0;
    }

    .show-thread-button {
        background-color: #0D85E8 !important;
        border-radius: 15px;
        color: white;
        width: 200px;
        margin: 0 0 15px 0 !important;
    }

    form {
        margin: 0 !important;
    }

    .publish-button {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100px;
        background-color: white !important;
        color: black !important;
        text-decoration: none !important;
        margin-right: 15px;
        align-items: center;
    }

    .evaluations {
        display: flex;
    }

    .evaluate-button {
        border: 1px solid #4AABFB;
        border-radius: 15px;
        padding: 5px;
    }

</style>
