<!DOCTYPE html>
<html>
<head>
    <title>Lista de Categorias</title>
</head>
<body>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
@if (Auth::check())
    <p>Olá, {{ Auth::user()->name }}</p>
@else
    <a href="{{ route('login') }}">Login</a>
@endif

<h1>Lista de Categorias</h1>
@if (Cookie::has('ultimo_produto'))
    <div>
        Você visitou um produto recentemente.
        <a href="{{ url('/produtos/' . Cookie::get('ultimo_produto')) }}">
            Voltar ao produto
        </a>
    </div><br>
@endif
<a href="{{ route('categorias.create') }}">Criar nova categoria</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nome }}</td>
            <td>
                <a href="{{ route('categorias.show', $categoria->id) }}">Ver</a>
                <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
