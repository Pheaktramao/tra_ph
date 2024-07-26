<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Validate other fields as necessary
        ]);

        // Prepare the data for insertion
        $data = $request->all();
        $data['user_id'] = $request->input('user_id', Auth::id()); // Use the provided user_id or the authenticated user's ID

        // Create the post
        $post = Post::create($data);

        // Return a JSON response
        return response()->json(['success' => 'Post created successfully!', 'post' => $post], 201);
    }
}
