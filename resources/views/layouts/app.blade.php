<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tin Tức 24h</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home.index') }}" class="navbar-brand fw-bold text-primary">Tin Tức 24h</a>
            <form action="{{ route('news.search') }}" method="GET" class="d-flex w-50">
                <input type="text" name="q" class="form-control me-2" placeholder="Tìm kiếm..." value="{{ request()->q }}">
                <button type="submit" class="btn btn-outline-primary">Tìm</button>
            </form>
            <div>
    @if(Auth::check())
        <span class="text-primary me-2">Xin chào, {{ Auth::user()->name }}</span>
        <a href="{{ route('auth.logout') }}" class="text-danger">Đăng xuất</a>
    @else
        <a href="{{ route('auth.login') }}" class="text-primary me-2">Đăng nhập</a>
        <a href="{{ route('auth.register') }}" class="text-primary me-2">Đăng ký</a>
    @endif
</div>

        </div>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('home.index') }}">Trang chủ</a></li>
                    @foreach (\App\Models\Category::all() as $category)
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('news.newsCate', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4">
        <div class="row">
            <section class="col-lg-8">
                @yield('content')
            </section>
            <aside class="col-lg-4">
                <div class="bg-light p-3 rounded">
                    <h3 class="h5 text-primary">Tin xem nhiều</h3>
                    <ul class="list-unstyled">
                        @foreach (\App\Models\News::orderBy('views', 'desc')->limit(3)->get() as $news)
                            <li class="mb-2">
                                <a href="{{ route('news.detail', $news->id) }}" class="text-dark">{{ $news->title }}</a>
                                <span class="text-muted">({{ $news->views }} lượt xem)</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">© 2025 Tin Tức 24h. Mọi quyền được bảo lưu.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
