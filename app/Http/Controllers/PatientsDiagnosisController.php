<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upload;
use Hash;
use Session;
use Auth;


class PatientsDiagnosisController extends Controller
{
    public function create()
    {
        $patientsdiagnose = upload::where('patientid', Auth::user()->id)->get();
        return view('patientsdiagnosis', compact('patientsdiagnose'));
    }
}
