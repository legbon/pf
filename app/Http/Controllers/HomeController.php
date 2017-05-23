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
        $repo = new \App\Legbon\User\UserHelper();
        $data = $req->except('confirm_password');
        $data['id'] = \Auth::id();
        
        $validate = $req->all();
        $validate['current_password'] = \Auth::user()->password;

        $valid = $repo->updateValidation($validate);

        if(!$valid['ok']) {
            $msg = $valid['err']['msg'];
            if($valid['err'] == config('errors')['PASSWORD_NOT_LIMIT']) {
                $msg .= " Passwords must be " . config('site')['PASSWORD_MIN'] ." to " .
                config('site')['PASSWORD_MAX'] . " long.";
            }
            $req->session()->flash('admin_status', $msg);
            return Redirect::back();
        }
        
        $data['password'] = \Hash::make($data['password']);

        if($repo->update($data, new \App\Legbon\Repositories\UserEloquentRepository)) {
            $req->session()->flash('admin_status', 'Account update successful!');
        } else {
            $req->session()->flash('admin_status', 'Account update failed!');
        }

        return Redirect::route('home');
    }


}
