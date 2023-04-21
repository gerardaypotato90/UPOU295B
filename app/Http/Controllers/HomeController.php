<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    public function home()
    {
        $data = array();

        if(Session::has('loginId')){

            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('home', compact('data'));
    }
}
