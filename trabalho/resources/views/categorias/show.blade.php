<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da Categoria</title>
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

<h1>Detalhes da Categoria</h1>
@if (Cookie::has('ultimo_produto'))
    <div>
        Você visitou um produto recentemente.
        <a href="{{ url('/produtos/' . Cookie::get('ultimo_produto')) }}">
            Voltar ao produto
        </a>
    </div><br>
@endif
<p><strong>ID:</strong> {{ $categoria->id }}</p>
<p><strong>Nome:</strong> {{ $categoria->nome }}</p>

<a href="{{ route('categorias.index') }}">Voltar</a>

</body>
</html>
