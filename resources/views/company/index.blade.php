@extends('layouts.default')

@section('content')

    <div id="main-content">
        <div id="index-header" class="w-full">
            <h1><b>Empresa</b></h1>
            <a id="new-button" href="/companies/create">
                Criar nova empresa
            </a>
        </div>

        <div id="content" class="w-full">
            @foreach($companies as $company)
                <div class="item-line">
                    <div class="item-content w-1/2">
                        <h2><b>{{ $company->name }}</b></h2>
                        {{ $company->description }}
                        <span class="company-category">{{ $company->category->name }} <br></span>
                    </div>
                    <div class="item-actions w-1/2">
                        <a class="edit-button" href="/companies/edit/{{ $company->id }}">Editar</a>
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
