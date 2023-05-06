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

class DoctorsToScheduleController extends Controller
{
    public function docsched($docid, $patid)
    {
        $drsched =  DB::select('select * from doctorslists where doctorid ='.$docid.'');
        $doctorsid = $docid;
        $patientid = $patid;
        return view('doctortoschedule', compact('drsched', 'doctorsid', 'patientid'));
    }
    public function bookpatient(Request $request, $docid, $patid)
    {
        $request->validate([
            'doctorid' => ['required', 'numeric', 'digits_between:1,20'],
            'doctorname' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'appointmentdate' => ['required', 'string', 'max:255'],
        ]);

        $patients = DB::select('select * from users where id = '.$patid.'');

        $doctorpatientapp = new doctorspatientappointment();       
        $doctorpatientapp->patientid = $patid;
        $doctorpatientapp->doctorid = $request->doctorid;
        $doctorpatientapp->patientname = $patients[0]->name;
        $doctorpatientapp->department = $request->department;
        $doctorpatientapp->appointmentdate = $request->appointmentdate;
        $doctorpatientapp->status = 'Approved/Active';
        $res = $doctorpatientapp->save();

        $patientdoctorsched = new patientdoctorlist();       
        $patientdoctorsched->patientid = $patid;
        $patientdoctorsched->doctorid = $request->doctorid;
        $patientdoctorsched->doctorspatientappointmentid = $doctorpatientapp->id;
        $patientdoctorsched->doctorname = $request->doctorname;
        $patientdoctorsched->department = $request->department;
        $patientdoctorsched->appointmentdate = $request->appointmentdate;
        $patientdoctorsched->status = 'Approved/Active';
        $res2 = $patientdoctorsched->save();

        

        return back()->with("success", "Patient is now scheduled");
    }
}
