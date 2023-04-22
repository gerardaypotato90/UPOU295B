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

class PatientCheckupStatusController extends Controller
{
    public function checkupstatus($id)
    {
        $dplist = doctorpatientlist::where('id', $id)
                 ->first();
        $docapp = doctorspatientappointment::where('patientid', $dplist->patientid)
            ->where('doctorid', $dplist->doctorid)
            ->where('id', $dplist->doctorspatientappointmentid)
            ->first();
        $plist = patientdoctorlist::where('patientid', $dplist->patientid)
            ->where('doctorid', $dplist->doctorid)
            ->where('doctorspatientappointmentid', $dplist->doctorspatientappointmentid)
            ->first();
        if ($docapp) {
            $docapp->status = 'Done Check-up';
            $docapp->save();
        }
        if ($plist) {
            $plist->status = 'Done Check-up';
            $plist->save();
        }
        if ($dplist) {
            $dplist->status = 'Done Check-up';
            $dplist->save();
        }
        
        return redirect('doctorsappointment');
    }
    public function checkupnoshow($id)
    {
        $dplist = doctorpatientlist::where('id', $id)
                 ->first();
        $docapp = doctorspatientappointment::where('patientid', $dplist->patientid)
            ->where('doctorid', $dplist->doctorid)
            ->where('id', $dplist->doctorspatientappointmentid)
            ->first();
        $plist = patientdoctorlist::where('patientid', $dplist->patientid)
            ->where('doctorid', $dplist->doctorid)
            ->where('doctorspatientappointmentid', $dplist->doctorspatientappointmentid)
            ->first();
        if ($docapp) {
            $docapp->status = 'No Show';
            $docapp->save();
        }
        if ($plist) {
            $plist->status = 'No Show';
            $plist->save();
        }
        if ($dplist) {
            $dplist->status = 'No Show';
            $dplist->save();
        }
        
        return redirect('doctorsappointment');
    }
}
