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
            <h1 class="display-4">Total</h1>
            <div>Since：{{ $totals->since }}</div>
            <div>Until：{{ $totals->until }}</div>
            <div>Pageviews：{{ $totals->pageviews->all }}</div>
            <div>Uniques：{{ $totals->uniques->all }}</div>
        </div>
    </div>
    <table class="table table-striped table-hover my-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Since</th>
            <th scope="col">Until</th>
            <th scope="col">Pageviews</th>
            <th scope="col">Uniques</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($timeseries as $item)
            <tr>
                <td>{{ $item->since }}</th>
                <td>{{ $item->until }}</td>
                <td>{{ $item->pageviews->all }}</td>
                <td>{{ $item->uniques->all }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
