<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('post.index') }}">Blog</a>
            <a class="navbar-brand" href="{{ route('post.create') }}">Post</a>
        </div>
    </nav> --}}
    <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 bg-light p-3 border-end" style="min-height: 100vh;">
        <h5 class="mb-3">👤 Username</h5>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#postModal">
          Create Post
        </button>
      </div>

      <!-- Main content placeholder -->
      <div class="col-md-9 p-4">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Modal -->
  <form method="POST" action="{{ route('post.store') }}">
    @csrf
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="postModalLabel">New Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="postContent" class="form-label">Your Post</label>
                <textarea name="content" class="form-control" id="postContent" rows="4"></textarea>
              </div>
              <button type="submit" class="btn btn-success">Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>