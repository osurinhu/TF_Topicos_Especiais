<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
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

<h1>Editar Produto</h1>

<form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $produto->nome }}"><br>

    <label>Categoria:</label>
    <select name="categoria">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" @if($categoria->id == $produto->categoria_id) selected @endif>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select><br>

    <label>Imagem nova:</label>
    <input type="file" name="imagem"><br>

    <button type="submit">Atualizar</button>
</form>


<a href="{{ route('produtos.index') }}">Voltar</a>

</body>
</html>
