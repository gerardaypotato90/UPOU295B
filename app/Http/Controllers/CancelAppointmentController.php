<?php

namespace App\Http\Controllers;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
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
        if ($patient) {
            $patient->status = "Cancel";
            $patient->save();
        }
        if ($doctor) {
            $doctor->status = "Cancel";
            $doctor->save();
        }
        return redirect()->route('patientappointmentstatus', $id)
                     ->with('success', 'Cancelled');
    }
}
