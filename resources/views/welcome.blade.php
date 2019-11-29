<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="jumbotron my-5">
        <div class="bs-callout bs-callout-info">
            <h1 class="display-4">總結</h1>
            <div>起始日期：{{ $totals->since }}</div>
            <div>結束日期：{{ $totals->until }}</div>
            <div>瀏覽數人數：{{ $totals->requests->all }}</div>
        </div>
    </div>
    <canvas id="chart"></canvas>
    <table class="table table-striped table-hover my-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">日期</th>
            <th scope="col">瀏覽數人數</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($timeseries as $item)
            <tr>
                <td>{{ $item->since }}</th>
                <td>{{ $item->requests->all }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        let ctx = $('#chart');
        let myLineChart = new Chart(ctx, {
            type: 'line',
            data: JSON.parse('{!! json_encode($chart) !!}'),
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: '報表'
                },
                tooltips: {
                    mode: 'label',
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '日期'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '數量'
                        }
                    }]
                }
            }
        });
    });
</script>
</body>
</html>
