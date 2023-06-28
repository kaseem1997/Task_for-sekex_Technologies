<!DOCTYPE html>
<html>

<head>
    <title>Bucket System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Create a Bucket</h1>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                <label for="name">Bucket Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="volume">Bucket Volume:</label>
                <input type="number" name="volume" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Suggest Buckets</button>
        </form>

        <table class="table">
            <tbody>
                @foreach ($buckets as $bucket)
                <li>{{ $bucket->name }} - Volume: {{ $bucket->volume }} - Filled Volume: {{ $bucket->filledVolume() }}</li>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS (at the end of the body) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>