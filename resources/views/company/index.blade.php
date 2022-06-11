<a href="/companies/create">Criar nova empresa</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->description }}</td>
            <td>{{ $company->category->name }}</td>
            <td>
                <a href="/companies/edit/{{ $company->id }}">Editar</a>
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
