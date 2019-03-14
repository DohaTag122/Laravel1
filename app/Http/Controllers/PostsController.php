<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    { 
        $users = User::all();
        //dd($users);
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        Post::create(request()->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        // $post = Post::where('id',$post)->get()->first();
        //select * from posts where id=1 limit 1;
        // $post = Post::where('id',$post)->first();
        // $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    public function show(Post $post)
    {  // $post = Post::find($post);   why [{id:1}]
        return view('posts.show', [
            'post' => $post,

        ]);
        
    }
    public function delete( $post)
    {
        $res=Post::where('id',$post)->delete();
        // $article = Post::findOrFail($post);
        // $article->delete();
        return redirect()->route('posts.index',[
            'posts' => Post::all()
        ]);/*
        return view('posts.index', [
            'posts' => Post::all()
        ]);*/
    }
  
    public function update(Post $post)
    {
       // Post::update(request()->all());
        Post::where('id',$post->id)->update(['title'=>request()->title]);
        Post::where('id',$post->id)->update(['description'=>request()->description]);

        return redirect()->route('posts.index');
    }


}
