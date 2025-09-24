@extends('layout.app')
@section('title', 'Index')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Posts</h1>

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <small class="text-muted">
                        {{ $post->created_at->format('F j, Y \\a\\t h:i A') }}
                    </small>
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>

                    <button class="btn btn-outline-primary mb-3 toggleComments">
                        View Comments
                    </button>

                    <div class="commentSection mt-3 d-none">
                        <h4>💬 Comments</h4>
                        <div class="commentsContainer overflow-auto" style="max-height: 200px;">
                            @forelse($post->comments as $comment)
                                <div class="mb-3">
                                    <p>{{ $comment->content }}</p>
                                    <small class="text-muted">
                                        {{ $comment->created_at->format('F j, Y \\a\\t h:i A') }}
                                    </small>
                                </div>
                            @empty
                                <p class="noComments">No comments yet.</p>
                            @endforelse
                        </div>

                         <!-- Comment Form -->
                        <form method="POST" action="{{ route('post.comment', $post) }}" 
                            class="mb-4 commentForm" data-post-id="{{ $post->id }}">
                            @csrf
                            <div class="mb-3">
                                <label for="commentText" class="form-label">Comment</label>
                                <textarea name="content" class="form-control" rows="3" placeholder="Write your comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <script>
        document.querySelectorAll('.toggleComments').forEach((button) => {
            button.addEventListener('click', () => {
                const commentSection = button.closest('.card-body').querySelector('.commentSection');
                const isHidden = commentSection.classList.toggle('d-none');
                button.textContent = isHidden ? 'View Comments' : 'Hide Comments';
            });
        });

        document.querySelectorAll('.commentForm').forEach((form) => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                e.currentTarget.disabled = true;

                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                        }
                    });

                    if (response.ok) {
                        const data = await response.json();

                        const commentsContainer = form.closest('.commentSection').querySelector('.commentsContainer');
                        const noCommentsMsg = commentsContainer.querySelector('.noComments');
                        if (noCommentsMsg) noCommentsMsg.remove();

                        const commentDiv = document.createElement('div');
                        commentDiv.classList.add('mb-3');
                        commentDiv.innerHTML = `
                            <p>${data.content}</p>
                            <small class="text-muted">${new Date(data.created_at).toLocaleDateString()}</small>
                        `;

                        commentsContainer.appendChild(commentDiv);
                        form.reset();
                    } else {
                        alert('Failed to submit comment. Please try again.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Something went wrong!');
                }
            });
        });
        </script>
@endsection