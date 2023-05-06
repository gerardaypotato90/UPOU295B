<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
use App\Models\dnotification;
use App\Models\User;
use Hash;
use Session;
use Auth;

class DoctorsMessageController extends Controller
{
    public function doctorsmessage()
    {
        $doctormessages = dnotification::where('doctorid', Auth::user()->id)->get();
        return view('doctorsmessages', compact('doctormessages'));
    }
}
