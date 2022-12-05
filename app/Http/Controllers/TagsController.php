<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function show(string $tagName) {
        $posts = Tag::where('name', $tagName)
        ->first()
        ->posts()
        ->with('user')
        ->latest()
        ->paginate(10);


        return view('posts.index', compact('posts'));
    }
}
