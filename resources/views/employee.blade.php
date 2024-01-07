<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание сотрудника</title>
    <link rel="stylesheet" href="css/employee.css">

</head>
<body>
<form action="{{ url('/employees') }}" method="post">
    @csrf
    <div class="container">
        <h1>Создайте сотрудника</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите вашу почту" name="email" required>

        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="password" required>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Регистрация</button>
        </div>
        <a href="{{ route('welcome') }}" style="text-decoration: none; padding: 10px 20px; background-color:green; color: #fff; border-radius: 5px; display: inline-block;">На главную</a>
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
