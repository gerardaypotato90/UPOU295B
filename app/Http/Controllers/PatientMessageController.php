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

class PatientMessageController extends Controller
{
    public function patientsmessage()
    {
        $patientsmessages = pnotification::where('patientid', Auth::user()->id)
                                                        ->get();
        return view('patientmessages', compact('patientsmessages'));
    }
}
