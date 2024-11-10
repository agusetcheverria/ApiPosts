<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    public function index() {
        return Post::all();
    }

    public function store(Request $request) {
        $request->validate([
            'author_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        return Post::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'content' => $request->content,
            'date' => now(),
        ]);
    }
}

