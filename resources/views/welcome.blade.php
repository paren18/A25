<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Начальная страница</title>
    <style>
        .form {
            text-align: center;
            display: grid;
            padding-top: 10%;
            padding-left: 30%;
            padding-right: 30%;
        }

        .form button {
            margin-bottom: 15px;
            width: 80%;
            height: 55px;
        }
    </style>
    
</head>
<body>
<div class="form">
    <form action="{{ route('employee') }}" method="get">
        <button type="submit">Создание сотрудника</button>
    </form>
    <form action="{{ route('hours') }}" method="get">
        <button type="submit">Принятие транзакции</button>
    </form>
    <form action="{{ route('sum') }}" method="get">
        <button type="submit">Вывод суммы</button>
    </form>
    <form action="{{ route('pay-all-hours') }}" method="get">
        <button type="submit">Выплата всей накопившейся суммы</button>
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
    </form>
</div>
</body>
</html>
