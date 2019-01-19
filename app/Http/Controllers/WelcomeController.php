<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = \App\User::all()->count();
        $comments = \App\Comment::all()->count();
        $posts = \App\Post::all()->count();

        return view('welcome',["usersAmount"=>$users,
        "commentsAmount"=>$comments,"postsAmount"=>$posts ]);
    }
}
