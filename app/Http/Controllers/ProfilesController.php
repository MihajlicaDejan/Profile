<?php

namespace App\Http\Controllers;
use Session;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required|email',
            'avatar'    => 'required|image',
            'facebook'  => 'required|url',
            'instagram' => 'required|url',
            'about'     => 'required'
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time(). $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/'. $avatar_new_name;
            $user->profile->save();

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->instagram = $request->instagram;
        $user->profile->about = $request->about;



        $user->profile->save();

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session::flash('success', 'User has been Updated');
        return redirect()->back();
    }
}
