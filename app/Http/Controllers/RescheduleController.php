<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
use App\Models\pnotification;
use App\Models\User;
use Hash;
use Session;
use Auth;

class RescheduleController extends Controller
{
    public function doctorsappststus($id)
    {
        $drappstatus = doctorspatientappointment::where('doctorid', '=', Auth::user()->id)
                                                ->where('id', '=', $id)
                                                ->get();
        return view('reschedule', compact('drappstatus'));
    }

    public function resched(Request $request, $id)
    {
        $request->validate([
            'rescheddate' => ['required', 'string', 'max:255'],
        ]);

        $docapp  = doctorspatientappointment::where('id', $id)
                                            ->first();
        
        $patient  = patientdoctorlist::where('doctorspatientappointmentid', $docapp->id)
                                    ->first();        
                                    
        $drpatientlist = doctorpatientlist::where('patientid', $docapp->patientid)
                                          ->where('doctorid', $docapp->doctorid)
                                          ->where('doctorspatientappointmentid', $docapp->id)
                                          ->where('patientdoctorlistsid', $patient->id)
                                          ->first();
        if ($docapp) {
            $docapp->appointmentdate = $request->rescheddate;
            $docapp->status = "Approved/Active";
            $docapp->save();
        }
        if ($patient) {
            $patient->appointmentdate = $request->rescheddate;
            $patient->status = "Approved/Active";
            $patient->save();
        }
        if ($drpatientlist) {
            $drpatientlist->status = 'Approved/Active';
            $drpatientlist->save();
        }

        $pnotifications = new pnotification();
        $pnotifications->doctorid = $docapp->doctorid;    
        $pnotifications->patientid = $docapp->patientid;
        $pnotifications->patientname = $docapp->patientname;
        $pnotifications->doctorname = $patient->doctorname;
        $pnotifications->message = 'Your Appointment is reschedule please check your Upcoming appointment page';
        $res = $pnotifications->save();

        return redirect()->route('reschedule', $id)
                     ->with('success', 'Appointment rescheduled successfully');
    }
}
