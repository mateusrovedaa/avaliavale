@extends('layouts.default')

@section('content')

    <div id="main-content">
        <div id="index-header" class="w-full">
            <h1><b>Categoria</b></h1>
            <a id="new-button" href="/categories/create">
                Criar nova categoria
            </a>
        </div>

        <div id="content" class="w-full">
        @foreach($categories as $category)
            <div class="item-line">
                <div class="item-content w-1/2">
                    <h2><b>{{ $category->name }}</b></h2>
                    {{ $category->description }}
                </div>
                <div class="item-actions w-1/2">
                    <a class="edit-button" href="/categories/edit/{{ $category->id }}">Editar</a>
                    <form method="post" action="/categories/{{ $category->id }}"> @csrf @method('delete')
                        <button class="delete-button">Excluir</button>
                    </form>
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

    </style>
