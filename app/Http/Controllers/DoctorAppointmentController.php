<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctorpatientlist;
use Hash;
use Session;
use Auth;


class DoctorAppointmentController extends Controller
{
    //
    public function drplist()
    {
        $dplist = doctorpatientlist::where('doctorid', '=', Auth::user()->id)->get();
        return view('doctorsappointment', compact('dplist'));
    }
}
