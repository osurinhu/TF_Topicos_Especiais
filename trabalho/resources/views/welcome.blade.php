<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
    <h1>Boa noite</h1>
    @if (Cookie::has('ultimo_produto'))
    <div>
        Você visitou um produto recentemente.
        <a href="{{ url('/produtos/' . Cookie::get('ultimo_produto')) }}">
            Voltar ao produto
        </a>
    </div><br>
@endif
    <h2>Rotas</h2>
    <ol>
    

        <li><a href="{{route('categorias.index')}}">categorias</a> : Exibi e criar categorias de produtos</li>
        <li><a href="{{route('produtos.index')}}">produtos</a> : Exibi e criar produtos</li>
    </ol>

</body>
</html>