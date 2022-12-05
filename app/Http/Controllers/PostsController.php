<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


// index - list users - GET /users
// show - single user - GET /users/:id
// create - create user form - GET /users/create*
// store - create user in db - POST /users
// edit - edit user form - GET /users/edit*/:id
// update - update user in db - PUT /users/:id
// destroy - delete user from db - DELETE /users/:id

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', [ 'except' => 'index' ]);
    }

    public function index() {
        // $posts = Post::paginate(10);
        $posts = Post::with('user')
        ->latest()
        ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        // $post = Post::find($id);
        // SELECT * FROM posts WHERE id = $id

        $post = Post::with('comments')->find($id);
        // SELECT * FROM posts
        // LEFT JOIN comments ON posts.id = comments.post_id where id = 1;


        return view('posts.show', compact('post'));
    }

    public function create() {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store() {
        $this->validate(
            request(),
            [
                'title' => 'required|max:20',
                'body' => 'required',
                'tags' => 'sometimes|array',
            ]
        );

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
        $post->tags()->attach(Request('tags'));

        return redirect('/posts');
    }
}
