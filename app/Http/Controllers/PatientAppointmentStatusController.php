<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientdoctorlist;
use App\Models\User;
use Hash;
use Session;
use Auth;

class PatientAppointmentStatusController extends Controller
{
    //
    public function pdrlist()
    {
        $plist = patientdoctorlist::where('patientid', Auth::user()->id)
                          ->whereIn('status', ['For Approval', 'Approved/Active'])
                          ->get();

        return view('patientappointmentstatus', compact('plist'));

    }
}
