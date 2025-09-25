<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(Post $post) {
        // $post = Post::all();
        // $posts = Post::with('comments')->latest()->get();
        $posts = Post::with( ['user', 'comments.user'])->latest()->get();
        return view('post.index', compact('posts'));
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $req) {
        $validated = $req->validate([
            // 'title' => 'required|max:255|string',
            'content' => 'required|string'
        ]);
        
        // Post::create($validated);
        $post = $req->user()->posts()->create($validated);

        return redirect()->route('post.index', $post);
    }

    public function show(Post $post) {
        $post->load('user', 'comments.user');
        $comment = $post->comments()->latest()->get();
        // $posts = collect([$post]);
        return view('post.show', compact('post', 'comment'));
    }

    public function addComment(Request $req, Post $post) {
        $validated = $req->validate([
            // 'author_name' => 'required|max:255|string',
            'content' => 'required|string'
        ]);

        // $validated['post_id'] = $post->id;
        $comment = $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => $req->user()->id,
        ]);

        // $comment = $post->comments()->create($validated);

        $comment->load('user');

        if($req->ajax()) {
            return response()->json($comment);
        }

        // return redirect()->route('post.show', $post);4
        return back()->with('success', 'Comment added successfully!');
    }
}
