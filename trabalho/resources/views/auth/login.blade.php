<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
@endif
<h1>Login</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Senha:</label>
    <input type="password" name="password">

    <br><br>

    <button type="submit">Entrar</button>
</form>
<a href=" {{ route('register')  }}">Criar conta</a>

</body>
</html>
