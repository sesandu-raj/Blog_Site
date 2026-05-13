<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'title' => 'required|string|max:255',
        //     'category' => 'required|string|max:255',
        //     'body' => 'required|string',
        // ]);

        // $post = Post::create($validatedData);

        // return response()->json($post, 201);
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
}
