<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $title          = Setting::first()->site_name;
        $categories     = Category::take(5)->get();
        $first_post     = Post::orderBy('created_at', 'desc')->first();
        $second_post    = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post     = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $wordpress      = Category::find(5);
        $tutorials      = Category::find(6);
        $settings       = Setting::first();

        return view('index', compact('title', 'categories', 'first_post', 'second_post', 'third_post', 'wordpress', 'tutorials', 'settings'));
    }



    public function singlePost($slug)
    {
        $post    = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single')->with('post', $post)
                             ->with('title', $post->title)
                             ->with('settings', Setting::first())
                             ->with('categories', Category::take(5)->get())
                             ->with('next', Post::find($next_id))
                             ->with('prev', Post::find($prev_id))
                             ->with('tags', Tag::all());
    }

    public function category($id)
    {
       $category = Category::findOrFail($id);
        return view('category')->with('category', $category)
                                ->with('title', $category->name)
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(5)->get());
    }


    public function tag($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tag')->with('tag', $tag)
                          ->with('title', $tag->tag)
                          ->with('settings', Setting::first())
                          ->with('categories', Category::take(5)->get());
    }

}
