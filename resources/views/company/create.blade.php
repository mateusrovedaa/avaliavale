<form method="post" action="/companies" enctype="multipart/form-data">
    @csrf
    <label>Nome:</label>
    <input name="name" required>

    <label>Descrição:</label>
    <textarea name="description"></textarea>

    <label>Categoria:</label>
    <select name="category" required>
        <option value="">Selecione...</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label>Logo:</label>
    <input name="logo" type="file">

    <button>Salvar</button>
</form>
