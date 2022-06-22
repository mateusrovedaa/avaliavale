@extends('layouts.default')

@section('content')

    <div id="main-content">
        <div id="index-header" class="w-full">
            <h1><b>Pergunta</b></h1>
            <a id="new-button" href="/questions/create">
                Criar nova pergunta
            </a>
        </div>

        <div id="content" class="w-full">
            @foreach($questions as $question)
                <div class="item-line">
                    <div class="item-content w-1/2">
                        <h4><b>{{ $question->name }}</b></h4>
                        <div class="tags">
                            <span class="tag-type">{{ $question->type }} <br></span>
                            <span class="company-category">{{ $question->category }} <br></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

<style>

    form, h2 {
        margin: 0 !important;
    }

    .tags {
        display: flex;
    }

</style>
