@extends('layouts.app')
@section('title', $news->title)
@section('content')
    <article class="card shadow-sm">
        <img src="{{ $news->image }}" class="card-img-top" alt="Tin tức">
        <div class="card-body">
            <h1 class="card-title h2 mb-3">{{ $news->title }}</h1>
            <p class="text-muted mb-3">Ngày đăng: {{ $news->created_at->format('d/m/Y') }} | {{ $news->views }} lượt xem</p>
            <div class="content mb-4">
                {!! $news->content !!}
            </div>
        </div>
        <div class="card-footer">
            <h3 class="h4 text-primary mb-3">Bình luận</h3>
            <div class="mb-3">
                @forelse ($comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>{{ $comment->user->name }}</strong> <small class="text-muted">({{ $comment->created_at->diffForHumans() }})</small>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Chưa có bình luận nào.</p>
                @endforelse
            </div>
            <form action="{{ route('news.comment.store', $news->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Viết bình luận..." rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>

        </div>
    </article>
@endsection