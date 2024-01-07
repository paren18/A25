<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>
    <link rel="stylesheet" href="css/hours.css">
</head>
<body>

<form class="form" action="{{ route('login') }}" method="post">
    @csrf
    <div class="container">
        <h1>Войдите в аккаунт</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите вашу почту" name="email" required>

        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="password" required>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Вход</button>
        </div>
        <a href="{{ route('welcome') }}" style="text-decoration: none; padding: 10px 20px; background-color: green; color: #fff; border-radius: 5px; display: inline-block;">На главную</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


</form>

</body>
</html>
