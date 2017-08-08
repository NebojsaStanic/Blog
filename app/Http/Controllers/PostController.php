<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    {
    	$posts = Post::latest()
                        ->filter(request(['month', 'year']))
                        ->get();

        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(created_at) desc')
                            ->get()
                            ->toArray();    

    	return view('posts.index', compact('posts', 'archives'));
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

        auth()->user()->publish(new Post(request(['title', 'body'])));

        // Post::create([

        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->user()->id
        // ]);

        return redirect('/');
    }

}
