<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.settings', compact('settings'));
    }

    public function update()
    {
        $this->validate(request(),[
            'site_name'         => 'required',
            'contact_email'     => 'required|email',
            'contact_number'    => 'required',
            'address'           => 'required',
            'biography'         => 'required',
            'motive1'           => 'required',
            'motive2'           => 'required'
        ]);


        $settings = Setting::first();

        $settings->site_name        = request()->site_name;
        $settings->contact_email    = request()->contact_email;
        $settings->contact_number   = request()->contact_number;
        $settings->address          = request()->address;
        $settings->biography        = request()->biography;
        $settings->motive1          = request()->motive1;
        $settings->motive2          = request()->motive2;

        $settings->save();

        Session::flash('success', 'Settings is updated');

        return redirect()->back();
    }
}
