<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class HomeController extends Controller
{
    //Middleware Code For Checking Login And Redirecting
    

    
    public function index()
    {
        $posts=Post::all();
        $comments=Comment::all();
        
        return view('home',compact('posts','comments'));
    }
}
