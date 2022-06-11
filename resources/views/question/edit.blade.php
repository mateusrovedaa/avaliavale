<form method="post" action="/questions/{{ $question->id }}">
    @csrf
    @method('put')

    <label>Nome:</label>
    <input name="name" required value="{{ $question->name }}">

    <label>Categoria:</label>
    <select name="category_id" required>
        <option value="">Selecione...</option>
        @foreach($categories as $category)
            <option {{ $category->id === $question->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label>Tipo:</label>
    <select name="type" required>
        <option value="">Selecione...</option>
        <option {{ $question->type === 'text' ? 'selected' : '' }} value="text">Texto</option>
        <option {{ $question->type === 'number' ? 'selected' : '' }} value="number">Número</option>
        <option {{ $question->type === 'list' ? 'selected' : '' }} value="list">Lista</option>
    </select>

    <label>Respostas válidas</label>
    <textarea name="valid_answers">{{ implode(',', $question->valid_answers) }}</textarea>

    <button>Salvar</button>
</form>
