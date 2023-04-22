<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Auth;

class AuthController extends Controller
{

    // ************************ Show Views ************************


    public function showLogin()
    {
        return view("auth.login");
    }

    public function showRegister()
    {
        return view("auth.register");
    }


    // ************************ Main Processor ************************


    public function loginUser(Request $req)
    {
        $req->validate([
            'Email'=>'required|max:100|email',
            'Password'=>'required|max:100'
        ]);

        $user = User::where('Email', '=', $req->Email)->first();

        if($user)
        {
            if(Hash::check($req->Password, $user->Password))
            {
                $req->session()->put('loginId', $user->id);
                $req->session()->put('user', $user);
                return redirect('/');
            }
            else
            {
                return back()->with('failed', 'Password is incorrect');
            }
        }
        
        return back()->with('failed', 'Email is not yet registered');
    }



    public function registerUser(Request $req)
    {
        $req->validate([
            'Email'=>'required|max:100|email|unique:User',
            'Password'=>'required|min:6|max:100',
            'FirstName'=>'required|max:100',
            'NickName'=>'required|max:50',
            'LastName'=>'required|max:100',
        ]);

        $user = new User();
        $user->Email = $req->Email;
        $user->FirstName = $req->FirstName;
        $user->NickName = $req->NickName;
        $user->MiddleName = $req->MiddleName ?? '';
        $user->LastName = $req->LastName;
        $user->Password = Hash::make($req->Password);
        $res = $user->save();

        if($res)
        {
            return redirect('login')->with('success', 'User has been registered successfully!');
        }
        
        return back()->with('failed', 'An error has occurred');
    }

    public function logoutUser()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return view('auth.logout');
        }

        return redirect('auth.login', compact('data'));
    }
    public function changePassword()
    {
        $user; 

        if (Session::has('user')) {
            $user = Session::get('user');
        }

        return view('change-password', compact('user'));
    }
}
