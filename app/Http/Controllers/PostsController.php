<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

        $posts = Post::latest()->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)', 'desc')
            ->get()
            ->toArray();


        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post){

        return view('posts.show', compact('post'));
    }


    public function create(){
        return view('posts.create');
    }

    public function store(){
        $post = new Post;

        $this->validate(request(), [

            'title' => 'required',
            'body' => 'required'
        ]);

        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();

        $post->save();

        return redirect('/');



    }
}
