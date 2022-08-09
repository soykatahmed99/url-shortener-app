<?php

namespace App\Http\Controllers;

use App\Models\PublicUser;
use Illuminate\Http\Request;
use Session;

class UserAuthController extends Controller
{
    private $user;
    public function registerUser(Request $request)
    {
        if ($request->password == $request->confirm_password)
        {
            PublicUser::createUser($request);
            return redirect()->back()->with('success', 'Registration Success');
        }
        else{
            return redirect()->back()->with('error', 'Password Did Not Matched');
        }
    }

    public function userLogin(Request $request)
    {
        $this->user = PublicUser::where('email', $request->email)->first();
        if ($this->user)
        {
            if (password_verify($request->password, $this->user->password))
            {
                Session::put('user_id', $this->user->id);
                Session::put('user_name', $this->user->name);
                return redirect('/user-dashboard');
            }
            else
            {
                return redirect()->back()->with('error', 'Wrong Password');
            }
        }
        else {
            return redirect()->back()->with('error', 'Email Does Not Exist');
        }
    }

    public function userLogout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        return redirect('/');
    }

}
