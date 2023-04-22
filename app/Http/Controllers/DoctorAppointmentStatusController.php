<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctorspatientappointment;
use App\Models\User;
use Hash;
use Session;
use Auth;

class DoctorAppointmentStatusController extends Controller
{
    //
    public function doctorsappststus()
    {
        $drappstatus = doctorspatientappointment::where('doctorid', '=', Auth::user()->id)
                                                ->where('status', '!=', 'Done Check-up')
                                                ->get();
        return view('doctorspatientappointment', compact('drappstatus'));
    }
}
