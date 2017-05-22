<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }


    /**
     * Show the edit page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.edit', ['user' => \Auth::user()]);
    }

    
    /**
     * Manage the admin's account update.
     * The repositories are weird. No idea how I was 
     * supposed to do this. But it works.
     * I guess I'll see as I continue.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $repo = new \App\Legbon\Repositories\UserEloquentRepository();
        $id = \Auth::id();
        $data = $req->except('confirm_password');
        
        if($data['password'] != $req->get('confirm_password')) {
            $req->session()->flash('admin_status', "Passwords don't match!");
            return Redirect::back();
        }

        if(strlen($data['password']) < 8) {
            $req->session()->flash('admin_status', "Password must have at least 8 characters.");
            return Redirect::back();
        }
        
        $data['password'] = bcrypt($data['password']);

        if($repo->update($id, $data)) {
            $req->session()->flash('admin_status', 'Account update successful!');
        } else {
            $req->session()->flash('admin_status', 'Account update failed!');
        }

        return Redirect::route('home');
    }


}
