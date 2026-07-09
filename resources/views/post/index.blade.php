<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Terkini</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover; 
        }
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 0.9em;
            padding: 8px 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .news-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">📰 Portal Berita</a>
            <div class="ml-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
            <h2 class="font-weight-bold m-0">Berita Terkini</h2>
        </div>
        
        <div class="row">
            @foreach($post as $p)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 news-card">
                    
                    <div class="position-relative">
                        <img src="{{ $p->image ?? 'https://via.placeholder.com/400x200?text=No+Image' }}" class="card-img-top" alt="Gambar Berita">
                        <span class="badge badge-danger category-badge">{{ $p->category }}</span>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="line-height: 1.4;">
                            {{ $p->title }}
                        </h5>
                        
                        <div class="text-muted small mb-3">
                            <span class="font-weight-bold text-primary">{{ $p->publisher }}</span> 
                            &bull; 
                            <span>{{ \Carbon\Carbon::parse($p->published_at)->format('d M Y') }}</span>
                        </div>
                        
                        <p class="card-text text-secondary">
                            {{ \Illuminate\Support\Str::limit($p->body, 100, '...') }}
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white border-0 pb-3 pt-0">
                        <a href="{{ route('post.show', $p->id) }}" class="btn btn-primary btn-block rounded-pill">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>