@extends('layouts.default')

@section('content')

    <div id="main-content">
        <h1><b>Edição de Categoria</b></h1>

        <form method="post" action="/categories/{{ $category->id }}">
            @csrf

            <input
                name="name"
                value="{{ $category->name }}"
                class="w-full input-av"
                placeholder="Nome"
                required
            >

            <textarea
                name="description"
                class="w-full textarea-av"
                placeholder="Descrição"
                required
            >{{ $category->description }}</textarea>

            <div class="form-buttons">
                <button onclick="history.back()" type="button" class="form-button-av back-button">Voltar</button>
                <button type="submit" class="form-button-av save-button">Salvar</button>
            </div>
        </form>
    </div>

@stop
