@extends('layouts.default')

@section('content')

    <div id="main-content">
        <h1><b>Cadastro de Empresa</b></h1>

        <form method="post" action="/companies" enctype="multipart/form-data">
            @csrf

            <input
                name="name"
                class="w-full input-av"
                placeholder="Nome"
                required
            >

            <textarea
                name="description"
                class="w-full textarea-av"
                placeholder="Descrição"
                required
            ></textarea>

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

            <button
                class="file-av"
                type="button"
                onclick="document.getElementById('getFile').click()"
            >
                Faça aqui o upload do logo da empresa
            </button>
            <input name="logo" id="getFile" type='file' class="hidden">

            <div class="form-buttons">
                <button onclick="history.back()" type="button" class="form-button-av back-button">Voltar</button>
                <button type="submit" class="form-button-av save-button">Salvar</button>
            </div>
        </form>
    </div>

@stop
