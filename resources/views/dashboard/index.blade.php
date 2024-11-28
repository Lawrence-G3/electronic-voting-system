<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h1>Upcoming Elections</h1>

    <!-- Check if there are elections -->
    @if($elections->isEmpty())
        <p>No upcoming elections.</p>
    @else
        <ul>
            @foreach ($elections as $election)
                <li>{{ $election->name }} - {{ $election->date->format('F j, Y') }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>
