<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::orderby('created_at', 'desc')->get();
    	return view('posts.index', compact('posts'));
    }

	public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    } 

    public function create()
    {
        return view('posts.create');
    } 

    public function store()
    { 
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create(request(['title', 'body']));
        return redirect('/');
    }

}