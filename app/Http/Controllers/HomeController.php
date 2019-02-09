<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(5)->get();
        return view('pages.home')->with('posts', $posts);
    }
}
