<form method="post" action="/categories">
    @csrf
    <label>Nome:</label>
    <input name="name" required>

    <label>Descrição:</label>
    <textarea name="description" required></textarea>

    <button>Salvar</button>
</form>
