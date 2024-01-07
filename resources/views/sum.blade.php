<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет по выплатам</title>
    <link rel="stylesheet" href="css/sum.css">
</head>
<body>

<div id="report-container">

</div>



<script>
    function fetchData() {
        fetch('/public/generate-report')
            .then(response => response.json())
            .then(data => {
                var html = '<h1>Отчет по выплатам</h1>';
                html += '<ul>';

                data.forEach(function (item) {
                    html += '<li>Сотрудник ID: ' + item.employee_id + ', Сумма выплат: ' + item.total_payment + ' руб.</li>';
                });

                html += '</ul>';
                html +='<a href="{{ route('welcome') }}" style="text-decoration: none; padding: 10px 20px; background-color: green; color: #fff; border-radius: 5px; display: inline-block;">На главную</a>';

                document.getElementById('report-container').innerHTML = html;
            })
            .catch(error => console.error('Произошла ошибка:', error));
    }

    fetchData();
</script>

</body>
</html>
