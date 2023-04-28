<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorpatientlist;
use Hash;
use Session;
use Auth;

class PatientsResultsController extends Controller
{
    public function patientlist()
    {
        $patientlists =  DB::select('select distinct patientid, doctorid, doctorname, patientname, department  FROM doctorpatientlists WHERE doctorid='.Auth::user()->id.' ;');
        return view('patientsresults', compact('patientlists'));
    }
}
