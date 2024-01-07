
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>
</head>
<style>
    form{
        padding-top:4%;
        padding-left:30%;
        padding-right:30%;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Установите стиль для всех кнопок */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

</style>
<body>

    <form class="form" action="{{ route('login') }}" method="post" >
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
