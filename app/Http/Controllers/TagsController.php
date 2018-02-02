<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    
    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'tag' => 'required'
        ]);

        Tag::create([
            'tag' => $request->tag
        ]);

        Session::flash('success', 'Tag is created');
        return redirect()->route('tags');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tag' => 'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->tag = $request->tag;
        $tag->save();

        Session::flash('success', 'Tag is successfully updated');
        return redirect()->route('tags');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        Session::flash('success', 'Tag is successfully deleted');
        return redirect()->back();
    }
}
