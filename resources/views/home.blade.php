<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home Dasbor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2>Selamat Datang, {{ Auth::user()->name }}! 🎉</h2>
        <p class="lead">Anda berhasil login ke dalam sistem.</p>
        
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>