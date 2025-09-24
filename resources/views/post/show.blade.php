@extends('layout.app')
@section('title', 'show')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p class="mb-4">{{ $post->content }}</p>

        <hr>

        <h4>Comments</h4>
        @forelse($comment as $comments)
            <div class="mb-3">
                <strong>{{ $comments->author_name }}</strong>
                <p>{{ $comments->content }}</p>
                <small class="text-muted">{{ $comments->created_at->format('F j, Y') }}</small>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse

        <hr>

        <h5>Add a Comment</h5>
        <form method="POST" action="{{ route('post.comment', $post) }}">
            @csrf
            <div class="mb-3">
                <label for="author_name" class="form-label">Your Name</label>
                <input type="text" name="author_name" id="author_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea name="content" id="content" rows="3" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit Comment</button>
        </form>
    </div>
@endsection