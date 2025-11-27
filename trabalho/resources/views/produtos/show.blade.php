<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Produto</title>
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

<h1>Detalhes do Produto</h1>

<p><strong>ID:</strong> {{ $produto->id }}</p>
<p><strong>Nome:</strong> {{ $produto->nome }}</p>
<p><strong>Categoria:</strong> {{ $produto->categoria->nome }}</p>
@if ($produto->imagem)
    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" width="300">
@else
    <p>Nenhuma imagem enviada.</p>
@endif

<a href="{{ route('produtos.index') }}">Voltar</a>

</body>
</html>
