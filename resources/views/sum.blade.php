<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет по выплатам</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #report-container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
    </style>

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

                document.getElementById('report-container').innerHTML = html;
            })
            .catch(error => console.error('Произошла ошибка:', error));
    }

    fetchData();
</script>

</body>
</html>
