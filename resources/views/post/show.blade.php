<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <a href="{{ url('/post') }}" class="btn btn-outline-secondary mb-4">&larr; Kembali ke Daftar Berita</a>

                <div class="card shadow-sm border-0">
                    <img src="{{ $post->image ?? 'https://via.placeholder.com/800x400?text=No+Image' }}" class="card-img-top" alt="Gambar Berita">
                    
                    <div class="card-body p-4">
                        <span class="badge badge-danger mb-2">{{ $post->category }}</span>
                        <h2 class="font-weight-bold mb-3">{{ $post->title }}</h2>
                        
                        <div class="text-muted border-bottom pb-3 mb-4">
                            Oleh <strong>{{ $post->publisher }}</strong> &bull; {{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}
                        </div>

                        <div style="line-height: 1.8; font-size: 1.1em;">
                            {{ $post->body }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>