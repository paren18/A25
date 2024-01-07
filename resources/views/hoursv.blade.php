<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отработанные часы</title>
    <style>
        form {
            padding-top: 4%;
            padding-left: 30%;
            padding-right: 30%;
        }

        input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus {
            background-color: #ddd;
            outline: none;
        }

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
            opacity: 1;
        }
    </style>

</head>
<body>

<form action="{{ url('/submit-hours') }}" method="post">
    @csrf
    <div class="container">
        <h1>Введите отработанные часы</h1>
        <label for="email"><b>Часы</b></label>
        <input type="text" placeholder="Введите отработанные часы" name="hours" required>
        <div class="clearfix">
            <button type="submit" class="signupbtn">Отправить</button>
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
