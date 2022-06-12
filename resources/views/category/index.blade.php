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

        #index-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #new-button {
            background-color: #75CC77;
            text-decoration: none;
            color: white;
            width: 200px;
            height: 27px;
            display:flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .edit-button {
            background-color: #0D85E8;
            text-decoration: none !important;
            color: white !important;
            width: 100px;
            height: 27px;
            display:flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin-right: 15px;
        }

        .delete-button {
            background-color: #E8410D;
            text-decoration: none !important;
            color: white !important;
            width: 100px;
            height: 27px;
            display:flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        #content {
            display: flex;
            flex-direction: column;
        }

        .item-line {
            border: 1px solid #4AABFB;
            margin-bottom: 10px;
            border-radius: 15px;
            display: flex;
            padding: 15px;
        }

        .item-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        form, h2 {
            margin: 0 !important;
        }

    </style>
