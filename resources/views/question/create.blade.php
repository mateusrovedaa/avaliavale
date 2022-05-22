<form method="post" action="/questions">
    @csrf
    <label>Nome:</label>
    <input name="name" required>

    <label>Categoria:</label>
    <select name="category_id" required>
        <option value="">Selecione...</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label>Tipo:</label>
    <select name="type" required>
        <option value="">Selecione...</option>
        <option value="text">Texto</option>
        <option value="number">Número</option>
        <option value="list">Lista</option>
    </select>

    <label>Respostas válidas</label>
    <textarea name="valid_answers"></textarea>

    <button>Salvar</button>
</form>
