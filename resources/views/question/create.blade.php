@extends('layouts.default')

@section('content')

    <div id="main-content">
        <h1><b>Cadastro de Perguntas</b></h1>

        <form method="post" action="/questions">
            @csrf

            <input
                name="name"
                class="w-full input-av"
                placeholder="Nome"
                required
            >

            <select
                name="category_id"
                required
                class="w-full select-av"
            >
                <option value="">Categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <select
                name="type"
                required
                class="w-full select-av"
            >
                <option value="">Selecione...</option>
                <option value="text">Texto</option>
                <option value="number">Número</option>
                <option value="list">Lista</option>
            </select>


            <textarea
                name="valid_answers"
                class="w-full textarea-av"
                placeholder="Respostas válidas"
            ></textarea>

            <div class="form-buttons">
                <button onclick="history.back()" type="button" class="form-button-av back-button">Voltar</button>
                <button type="submit" class="form-button-av save-button">Salvar</button>
            </div>
        </form>
    </div>

@stop
