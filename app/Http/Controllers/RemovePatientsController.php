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

class RemovePatientsController extends Controller
{
    public function index()
    {
        $patients = User::where('usertype', '=', 'Patient')->get();
        return view('removepatients', compact('patients'));
    }
    public function remove($id)
    {
        $patients = User::where('usertype', '=', 'Patient')
                        ->where('id', $id);
        $patients->delete();
        return view('removepatients', compact('patients'));
    }
}
