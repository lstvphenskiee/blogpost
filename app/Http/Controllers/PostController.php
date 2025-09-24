<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $req) {
        $validated = $req->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string'
        ]);
        
        Post::create($validated);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        $comment = $post->comments()->latest()->get();
        return view('post.show', compact('post', 'comment'));
    }

    public function addComment(Request $req, Post $post) {
        $validated = $req->validate([
            'author_name' => 'required|max:255|string',
            'content' => 'required|string'
        ]);

        // $validated['post_id'] = $post->id;
        $post->comments()->create($validated);

        return redirect()->route('post.show', $post);
    }
}
