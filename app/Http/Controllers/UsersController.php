<?php

namespace App\Http\Controllers;
use Session;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads/avatars/a.jpg'
        ]);

        Session::flash('success', 'User create successfully');
        return redirect()->route('users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->profile->delete();
        $user->delete();

        Session::flash('success', 'User is now Deleted');
        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success', 'User is now Admin');
        return redirect()->back();
    }

    public function author($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success', 'User is now Author');
        return redirect()->back();
    }
}
