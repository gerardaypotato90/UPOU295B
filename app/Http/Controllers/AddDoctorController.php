<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorslist;
use App\Models\department;
use App\Models\User;
use Hash;
use Session;
use Auth;


class AddDoctorController extends Controller
{
    public function adddoctor(Request $request)
    {
        $request->validate([
            'did' => ['required', 'numeric', 'digits_between:1,20'],
            'department' => ['required', 'string', 'max:255'],
            'availabledays' => ['required', 'string', 'max:255'],
            'availabletime' => ['required', 'string', 'max:255'],
        ]);

        
        $user2 =  DB::select('select * from users where id ='.$request->did.'');

        $patientdrlist = new doctorslist();       
        $patientdrlist->doctorid = $request->did;
        $patientdrlist->doctorname = 'Dr. ' . $user2[0]->name;
        $patientdrlist->department = $request->department;
        $patientdrlist->availabledays = $request->availabledays;
        $patientdrlist->availabletime = $request->availabletime;  
        $res = $patientdrlist->save();

        return back()->with("success", "Records saved successfully");
    }
    public function index()
    {
        $users =  DB::select('select * from users where usertype = "Doctor" and id not in (select doctorid from doctorslists)');
        
        $departments = department::all();

        return view('adddoctorslist')->with([
            'user' => $users,
            'departments' => $departments,
        ]);
    }
}
