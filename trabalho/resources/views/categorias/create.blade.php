<!DOCTYPE html>
<html>
<head>
    <title>Criar Categoria</title>
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
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
@endif


<h1>Criar Categoria</h1>

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf

    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" id="nome">

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('categorias.index') }}">Voltar</a>

</body>
</html>
