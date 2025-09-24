@extends('layout.app')
@section('title', 'Post')

@section('content')
    <div class="container">
        <h1>Create New Post</h1>

        <form method="POST" action="{{ route('post.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Post Content</label>
                <textarea name="content" id="content" rows="6" class="form-control" required></textarea>
            </div>

            {{-- Optional: Category or Tags (can be added later) --}}
            {{-- <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" name="tags" id="tags" class="form-control">
            </div> --}}

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
@endsection