@extends('layouts.default')

@section('content')

    <div id="main-content">
        <h1><b>Edição de Empresa</b></h1>

        <form method="post" action="/companies/{{ $company->id }}">
            @csrf
            @method('put')

            <input
                name="name"
                class="w-full input-av"
                placeholder="Nome"
                required
                disabled
                value="{{ $company->name }}"
            >

            <textarea
                name="description"
                class="w-full textarea-av"
                placeholder="Descrição"
                required
            >{{ $company->description }}</textarea>

            <select
                name="category_id"
                required
                class="w-full select-av"
            >
                <option value="">Categoria...</option>
                @foreach($categories as $category)
                    <option {{ $category->id === $company->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <img style="max-height: 150px" src="data:image/png;base64, {{ $company->logo }}">

            <div class="form-buttons">
                <button onclick="history.back()" type="button" class="form-button-av back-button">Voltar</button>
                <button type="submit" class="form-button-av save-button">Salvar</button>
            </div>
        </form>

    </div>

@stop
