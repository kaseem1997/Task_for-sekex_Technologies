<!DOCTYPE html>
<html>
<head>
    <title>Bucket System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Suggested Buckets</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Ball</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestedBuckets as $ball => $quantity)
                <tr>
                    <td>{{ $ball }}</td>
                    <td>{{ $quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS (at the end of the body) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
