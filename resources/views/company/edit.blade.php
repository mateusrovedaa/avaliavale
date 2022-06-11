<form method="post" action="/companies/{{ $company->id }}">
    @csrf
    @method('put')

    <label>Nome:</label>
    <input name="name" disabled value="{{ $company->name }}">

    <label>Descrição:</label>
    <textarea name="description" required>{{ $company->description }}</textarea>

    <label>Categoria:</label>
    <select name="category_id" required>
        <option value="">Selecione...</option>
        @foreach($categories as $category)
            <option {{ $category->id === $company->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <img src="data:image/png;base64, {{ $company->logo }}">

    <button>Salvar</button>
</form>
