<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }
    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('posts');
         
    }
    public function welcome()
{
    $posts = Post::all();

    return view('welcome', compact('posts'));
}
public function show($id)
{
    $post = Post::find($id);

    return view('show', compact('post'));
}

}
