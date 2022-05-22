<a href="/categories/create">Criar nova categoria</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="/categories/edit/{{ $category->id }}">Editar</a>
                <form method="post" action="/categories/{{ $category->id }}"> @csrf @method('delete') <button>Excluir</button></form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
