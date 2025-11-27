<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuário</title>
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

<h1>Registrar Usuário</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="name">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Senha:</label>
    <input type="password" name="password">

    <br><br>

    <label>Confirmar Senha:</label>
    <input type="password" name="password_confirmation">

    <br><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
