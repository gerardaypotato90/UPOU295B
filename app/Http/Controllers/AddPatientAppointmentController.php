<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorpatientlist;
use App\Models\doctorspatientappointment;
use App\Models\patientdoctorlist;
use App\Models\doctorsschedule;
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
        $drpatientlist->patientid = $request->patientname;
        $drpatientlist->doctorid = $request->doctorname;
        $drpatientlist->doctorname = $doc[0]->name;
        $drpatientlist->patientname = $pat[0]->name;
        $drpatientlist->department = $dept[0]->department;
        $drpatientlist->appointmentdate = $request->appointmentdate;
        $drpatientlist->status = $request->status;  
        $res = $drpatientlist->save();

        $doctorpatientapp = new doctorspatientappointment();       
        $doctorpatientapp->patientid = $pat[0]->id;
        $doctorpatientapp->doctorid = $doc[0]->id;
        $doctorpatientapp->patientname = $pat[0]->name;
        $doctorpatientapp->department = $dept[0]->department;
        $doctorpatientapp->appointmentdate = $request->appointmentdate;
        $doctorpatientapp->status = $request->status;
        $res = $doctorpatientapp->save();

        $patientdoctorsched = new patientdoctorlist();       
        $patientdoctorsched->patientid = $pat[0]->id;
        $patientdoctorsched->doctorid = $doc[0]->id;
        $patientdoctorsched->doctorspatientappointmentid = $doctorpatientapp->id;
        $patientdoctorsched->doctorname = $doc[0]->name;
        $patientdoctorsched->department = $dept[0]->department;
        $patientdoctorsched->appointmentdate = $request->appointmentdate;
        $patientdoctorsched->status = $request->status;
        $res2 = $patientdoctorsched->save();

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
