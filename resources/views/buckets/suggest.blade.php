<!DOCTYPE html>
<html>
<head>
    <title>Bucket System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Bucket Suggestion Form</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('buckets.suggest') }}">
            @csrf
            <div class="form-group">
                <label for="volume">Required Volume:</label>
                <input type="number" name="volume" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Suggested Buckets</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (at the end of the body) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
