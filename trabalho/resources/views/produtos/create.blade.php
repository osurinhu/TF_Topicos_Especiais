<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
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


<h1>Criar Produto</h1>

<form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome"><br>

    <label>Categoria:</label>
    <select name="categoria">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
    </select><br>

    <label>Imagem:</label>
    <input type="file" name="imagem"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('produtos.index') }}">Voltar</a>

</body>
</html>
