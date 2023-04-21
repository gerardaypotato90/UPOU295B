<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\patientdoctorlist;
use App\Models\doctorsschedule;
use App\Models\doctorslist;
use Hash;
use Session;
use Auth;


class docscheduleController extends Controller
{
    //
    public function docsched($doc_sched)
    {
        $drsched =  DB::select('select * from doctorslists where doctorid ='.$doc_sched.'');
        $doctorScheduleId = $doc_sched;
        return view('doctorschedule', compact('drsched', 'doctorScheduleId'));
    }
    public function bookpatient(Request $request)
    {
        $request->validate([
            'doctorid' => ['required', 'numeric', 'digits_between:1,20'],
            'doctorname' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'appointmentdate' => ['required', 'string', 'max:255'],
        ]);

        $doctorpatientapp = new doctorspatientappointment();       
        $doctorpatientapp->patientid = Auth::user()->id;
        $doctorpatientapp->doctorid = $request->doctorid;
        $doctorpatientapp->patientname = Auth::user()->name;
        $doctorpatientapp->department = $request->department;
        $doctorpatientapp->appointmentdate = $request->appointmentdate;
        $doctorpatientapp->status = 'For Approval';
        $res = $doctorpatientapp->save();

        $patientdoctorsched = new patientdoctorlist();       
        $patientdoctorsched->patientid = Auth::user()->id;
        $patientdoctorsched->doctorid = $request->doctorid;
        $patientdoctorsched->doctorspatientappointmentid = $doctorpatientapp->id;
        $patientdoctorsched->doctorname = $request->doctorname;
        $patientdoctorsched->department = $request->department;
        $patientdoctorsched->appointmentdate = $request->appointmentdate;
        $patientdoctorsched->status = 'For Approval';
        $res2 = $patientdoctorsched->save();

        

        return back()->with("success", "Thank you!!");
    }
}
