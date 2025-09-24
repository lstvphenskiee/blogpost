@extends('layout.app')
@section('title', 'Index')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Posts</h1>

        @foreach($post as $posts)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $posts->title }}</h4>
                    <small class="text-muted">{{ $posts->created_at->format('F j, Y \\a\\t h:i A') }}</small>
                    <p class="card-text">{{ Str::limit($posts->content, 150) }}</p>
                    <a href="{{ route('post.show', $posts) }}" class=" btn badge bg-primary btn-sm">View Comment</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection