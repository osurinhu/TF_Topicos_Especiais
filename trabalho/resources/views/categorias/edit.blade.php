<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoria</title>
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

<h1>Editar Categoria</h1>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" id="nome" value="{{ $categoria->nome }}">

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('categorias.index') }}">Voltar</a>

</body>
</html>
