<!DOCTYPE html>
<html>

<head>
    <title>Bucket System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Create a Ball</h1>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('balls.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ball Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="volume">Ball Volume:</label>
                <input type="number" name="volume" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Ball Quantity:</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Ball</button>
        </form>

        <h2>List of Balls</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Volume</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($balls as $ball)
                <tr>
                    <td>{{ $ball->name }}</td>
                    <td>{{ $ball->volume }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS (at the end of the body) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>