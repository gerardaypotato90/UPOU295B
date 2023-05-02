<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
use App\Models\User;
use Hash;
use Session;
use Auth;

class PatientRescheduleController extends Controller
{
    public function doctorsappststus($id)
    {
        $patientapptstatus = patientdoctorlist::where('patientid', '=', Auth::user()->id)
                                                ->where('id', '=', $id)
                                                ->get();
        return view('patientreschedule', compact('patientapptstatus'));
    }

    public function resched(Request $request, $id)
    {
        $request->validate([
            'rescheddate' => ['required', 'string', 'max:255'],
        ]);


        $patient  = patientdoctorlist::where('id', $id)
                                            ->first();

        $doctor  = doctorspatientappointment::where('patientid', $patient->patientid)
                                            ->where('doctorid', $patient->doctorid)
                                            ->where('id', $patient->doctorspatientappointmentid)
                                            ->first();

        $drpatientlist = doctorpatientlist::where('patientid', $doctor->patientid)
                                          ->where('doctorid', $doctor->doctorid)
                                          ->where('doctorspatientappointmentid', $doctor->id)
                                          ->where('patientdoctorlistsid', $patient->id)
                                          ->first();
        if ($patient) {
            $patient->appointmentdate = $request->rescheddate;
            $patient->status = "For Approval";
            $patient->save();
        }
        if ($doctor) {
            $doctor->appointmentdate = $request->rescheddate;
            $doctor->status = "For Approval";
            $doctor->save();
        }
        if ($drpatientlist) {
            $drpatientlist->appointmentdate = $request->rescheddate;
            $drpatientlist->status = 'For Approval';
            $drpatientlist->save();
        }
        return redirect()->route('patientreschedule', $id)
                     ->with('success', 'Appointment rescheduled successfully');
    }

    
}
