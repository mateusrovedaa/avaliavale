<a href="/questions/create">Criar nova pergunta</a>

<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Categoria</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
        <tr>
            <td>{{ $question->name }}</td>
            <td>{{ $question->type }}</td>
            <td>{{ $question->category->name }}</td>
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
