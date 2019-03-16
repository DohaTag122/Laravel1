<?php

namespace App\Http\Controllers\Api;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts);
    }
    public function show($post)
    {
        $post = Post::findOrFail($post);
       // $post = Post::with($post)->get();
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return response()->json([
            'message' => 'Post Created Successfully'
        ],201);
    }
}
