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

class AddPatientAppointmentController extends Controller
{
    //
    public function doctorpatientlist(Request $request)
    {
        $request->validate([
            'doctorname' => ['required', 'string', 'max:255'],
            'patientname' => ['required', 'string', 'max:255'],
            'appointmentdate' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);
        $doc =  DB::select('select * from users where id ='.$request->doctorname.'');
        $pat =  DB::select('select * from users where id ='.$request->patientname.'');
        $dept =  DB::select('select * from doctorslists where doctorid= '.$request->doctorname.'');

        $drpatientlist = new doctorpatientlist();       
        $drpatientlist->patientid = $request->doctorname;
        $drpatientlist->doctorid = $request->doctorname;
        $drpatientlist->doctorname = $doc[0]->name;
        $drpatientlist->patientname = $pat[0]->name;
        $drpatientlist->department = $dept[0]->department;
        $drpatientlist->appointmentdate = $request->appointmentdate;
        $drpatientlist->status = $request->status;  
        $res = $drpatientlist->save();

        return back()->with("success", "Records saved successfully");
    }
    public function index()
    {
        $doctors =  DB::select('select * from users where usertype = "Doctor"');
        $patients = DB::select('select * from users where usertype = "Patient"');
        

        return view('addpatientappointment')->with([
            'doctors' => $doctors,
            'patients' => $patients,
        ]);
    }
}
