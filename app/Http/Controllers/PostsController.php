<?php

namespace App\Http\Controllers;


use App\Category;
use App\Profile;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories  and tags before create a post');
            return redirect()->back();
        }
        return view('admin.posts.create',compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         => 'required',
            'featured'      => 'required|image',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create(array(
            'title' => $request->title,
            'content' =>$request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ));
        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created succesfully');
        return redirect()->route('posts');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'title' => 'required',
          'content' => 'required',
          'category_id' => 'required'
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('featured'))
            {
                $featured = $request->featured;

                $featured_new_name = time() . $featured->getClientOriginalName();

                $featured->move('uploads/posts', $featured_new_name);

                $post->featured = 'uploads/posts/' .$featured_new_name;
            }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post uploaded successfully!');
        return redirect()->route('posts');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('success', 'The post was just trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();

        $posts->forceDelete();

        Session::flash('success', 'Post is DELETED');
        return redirect()->back();
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();

        $posts->restore();

        Session::flash('success', 'Post is Restored');
        return redirect()->route('posts');
    }
}
