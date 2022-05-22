<form method="post" action="/categories/{{ $category->id }}">
    @csrf
    @method('put')

    <label>Nome:</label>
    <input name="name" required value="{{ $category->name }}">

    <label>Descrição:</label>
    <textarea name="description" required>{{ $category->description }}</textarea>

    <button>Salvar</button>
</form>
