<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with('posts_count', Post::all()->count())
                                      ->with('trashed_count', Post::onlyTrashed()->get()->count())
                                      ->with('user_count', User::all()->count())
                                      ->with('category_count', Category::all()->count());
    }
}
