@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    @if (isset($query))
        <h1 class="h4 text-warning mb-4">Kết quả tìm kiếm cho: "{{ $query }}"</h1>
        @if ($news->isEmpty())
            <div class="alert alert-info">Không tìm thấy kết quả nào. Vui lòng thử lại với từ khóa khác.</div>
        @else
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    @if ($item->image)
                                        <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="{{ $item->title }}" loading="lazy">
                                    @else
                                        <img src="{{ asset('images/no-image.jpg') }}" class="img-fluid rounded-start" alt="Không có hình ảnh">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title h5">
                                            <a href="{{ route('news.detail', $item->id) }}" class="text-dark text-decoration-none">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <p class="card-text text-muted">{{ \Str::limit($item->description, 120) }}</p>
                                        <small class="text-muted">
                                            {{ $item->created_at->diffForHumans() }} | {{ $item->views }} lượt xem
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <!-- Featured News -->
        <section class="mb-5">
            <h2 class="h4 text-primary mb-4">Tin nổi bật</h2>
            <div class="row">
                @foreach ($featuredNews as $news)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            @if ($news->image)
                                <img src="{{ $news->image }}" class="card-img-top" alt="{{ $news->title }}" loading="lazy">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top" alt="Không có hình ảnh">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title h5">
                                    <a href="{{ route('news.detail', $news->id) }}" class="text-dark text-decoration-none">
                                        {{ $news->title }}
                                    </a>
                                </h3>
                                <p class="card-text text-muted">{{ \Str::limit($news->description, 100) }}</p>
                                <small class="text-muted">
                                    {{ $news->created_at->diffForHumans() }} | {{ $news->views }} lượt xem
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Latest News -->
      <section>
    <h2 class="h4 text-primary mb-4">Tin mới nhất</h2>
    <div class="row">
        @foreach ($latestNews as $news)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm border-0 hover-shadow">
                    <a href="{{ route('news.detail', $news->id) }}" class="text-decoration-none">
                        <img src="{{ $news->image ?: asset('images/default-news.jpg') }}" 
                             class="card-img-top rounded-top" 
                             alt="{{ $news->title }}" 
                             loading="lazy">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title h6">
                            <a href="{{ route('news.detail', $news->id) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($news->title, 60) }}
                            </a>
                        </h4>
                        <small class="text-muted d-block">
                            {{ $news->created_at->diffForHumans() }} | {{ number_format($news->views) }} lượt xem
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    @endif
@endsection
