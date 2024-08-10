<!-- resources/views/vaccines/index.blade.php -->
@php
    use Carbon\Carbon;
@endphp

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Vaccine Dashboard</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Vaccinated Date</th>
                <th>Batch Number</th>
                <th>Adverse Effects</th>
                <th>Age to be Vaccinated</th>
                <th>Child ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vaccines as $vaccine)
                <tr>
                    <td>{{ $vaccine->name }}</td>
                    <td>{{ Carbon::parse($vaccine->vaccinated_date)->format('Y-m-d') }}</td>
                    <td>{{ $vaccine->batch_no }}</td>
                    <td>{{ $vaccine->adverse_effects }}</td>
                    <td>{{ Carbon::parse($vaccine->age_to_be_vaccinated)->format('Y-m-d') }}</td>
                    <td>{{ $vaccine->child_id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
