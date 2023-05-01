<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorpatientlist;
use App\Models\doctorslist;
use App\Models\department;
use App\Models\User;
use Hash;
use Session;
use Auth;

class RemoveDoctorsController extends Controller
{
    public function index()
    {
        $doctors = User::where('usertype', '=', 'Doctor')->get();
        return view('removedoctors', compact('doctors'));
    }
    public function remove($id)
    {
        $doctors = User::where('usertype', '=', 'Doctor')
                        ->where('id', $id);
        $doctors->delete();
        return view('removedoctors', compact('doctors'));
    }
}
