<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    public function index() {
        return Post::all();
        return response()->json($posts);
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

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
        $post->update($request->all());
        return response()->json($post);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
        $post->delete();
        return response()->json(['message' => 'Post eliminado']);
    }
}

