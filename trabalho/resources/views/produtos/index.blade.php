<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
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

<h1>Lista de Produtos</h1>
@if (Cookie::has('ultimo_produto'))
    <div>
        Você visitou um produto recentemente.
        <a href="{{ url('/produtos/' . Cookie::get('ultimo_produto')) }}">
            Voltar ao produto
        </a>
    </div><br>
@endif

<a href="{{ route('produtos.create') }}">Criar novo produto</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>

    @foreach ($produtos as $produto)
    <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->nome }}</td>
        <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
        <td>
            <a href="{{ route('produtos.show', $produto->id) }}">Ver</a>
            <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>

            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
