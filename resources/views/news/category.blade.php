@extends('layouts.app')
@section('title', ucfirst($category))
@section('content')
    <h1 class="h4 text-primary mb-3">{{ ucfirst($category) }}</h1>
    
    @if (request()->has('q'))
        <h2 class="h5 mb-3">Kết quả tìm kiếm: "{{ request()->q }}"</h2>
        @if ($news->isEmpty())
            <p class="text-muted">Không tìm thấy kết quả nào.</p>
        @else
            @foreach ($news as $item)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title h5">
                                    <a href="{{ route('news.detail', $item->id) }}" class="text-dark text-decoration-none">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
                                <small class="text-muted">{{ $item->created_at->format('d/m/Y') }} | {{ $item->views }} lượt xem</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @else
        <div class="row">
            @forelse ($news as $index => $item)
                @if ($index == 0)
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm border-0">
                            <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}">
                            <div class="card-body">
                                <h2 class="card-title h5">
                                    <a href="{{ route('news.detail', $item->id) }}" class="text-dark text-decoration-none">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="card-text text-muted">{{ Str::limit($item->description, 120) }}</p>
                                <small class="text-muted">{{ $item->created_at->format('d/m/Y') }} | {{ $item->views }} lượt xem</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                @else
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title h6">
                                        <a href="{{ route('news.detail', $item->id) }}" class="text-dark text-decoration-none">
                                            {{ $item->title }}
                                        </a>
                                    </h2>
                                    <small class="text-muted">{{ $item->created_at->format('d/m/Y') }} | {{ $item->views }} lượt xem</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-muted">Chưa có tin nào trong danh mục này.</p>
            @endforelse
            </div>
        </div>
    @endif
@endsection