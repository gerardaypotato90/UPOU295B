<?php

namespace App\Http\Controllers;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
use App\Models\dnotification;
use App\Models\User;
use Hash;
use Session;
use Auth;

use Illuminate\Http\Request;

class CancelAppointmentController extends Controller
{
    public function cancel(Request $request, $id)
    {
        $patient  = patientdoctorlist::where('id', $id)
                                            ->first();

        $doctor  = doctorspatientappointment::where('patientid', $patient->patientid)
                                            ->where('doctorid', $patient->doctorid)
                                            ->where('id', $patient->doctorspatientappointmentid)
                                            ->first();
        $drplist = doctorpatientlist::where('patientid', $patient->patientid)
            ->where('doctorid', $patient->doctorid)
            ->where('doctorspatientappointmentid', $doctor->id)
            ->where('patientdoctorlistsid', $patient->id)
            ->first();

        if ($patient) {
            $patient->status = "Cancel";
            $patient->save();
        }
        if ($doctor) {
            $doctor->status = "Cancel";
            $doctor->save();
        }

        if ($drplist) {
            $drplist->status = "Cancel";
            $drplist->save();
        }

        $pnotifications = new dnotification();
        $pnotifications->doctorid = $drplist->doctorid; 
        $pnotifications->patientid = Auth::user()->id;
        $pnotifications->patientname = Auth::user()->name;
        $pnotifications->doctorname = $drplist->doctorname;
        $pnotifications->message = 'Patient cancelled the appointment. Please check upcoming appointment.';
        $res = $pnotifications->save();

        return redirect()->route('patientappointmentstatus', $id)
                     ->with('success', 'Cancelled');
    }
}
