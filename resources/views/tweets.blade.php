<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Tweets</h1>
    @foreach ($tweets as $tweet)
        <div>
            <p>{{ $tweet->content }}</p>
            <p>Dibuat oleh: {{ $tweet->user->name }}</p>
        </div>
    @endforeach

    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <label for="content">Tweet:</label>
        <input type="text" name="content" id="content">
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
