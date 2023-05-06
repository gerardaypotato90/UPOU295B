<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
use App\Models\pnotification;
use Hash;
use Session;
use Auth;

class ApprovedPatientController extends Controller
{
    public function approved($pid, $id)
    {
        $drsched =  DB::select('select * from doctorspatientappointments where id='.$id.' and patientid ='.$pid.' and status ="For Approval"');
        $users =  DB::select('select * from users where id = '.$drsched[0]->doctorid.'');
        $docapp = doctorspatientappointment::where('patientid', $pid)
            ->where('doctorid', $drsched[0]->doctorid)
            ->where('id', $id)
            ->first();
        $plist = patientdoctorlist::where('patientid', $pid)
            ->where('doctorid', $drsched[0]->doctorid)
            ->where('doctorspatientappointmentid', $id)
            ->first();
        $drpatientlist = doctorpatientlist::where('patientid', $drsched[0]->patientid)
                                          ->where('doctorid', $drsched[0]->doctorid)
                                          ->where('doctorspatientappointmentid', $docapp->id)
                                          ->where('patientdoctorlistsid', $plist->id)
                                          ->first();

        if ($docapp) {
            $docapp->status = 'Approved/Active';
            $docapp->save();
        }
        if ($plist) {
            $plist->status = 'Approved/Active';
            $plist->save();
        }
        if ($drpatientlist) {
            $drpatientlist->status = 'Approved/Active';
            $drpatientlist->save();
        }

        $pnotifications = new pnotification();
        $pnotifications->doctorid = $drpatientlist->doctorid;    
        $pnotifications->patientid = $drpatientlist->patientid;
        $pnotifications->patientname = $drpatientlist->patientname;
        $pnotifications->doctorname = $drpatientlist->doctorname;
        $pnotifications->message = 'Your appoinment is now approved please check Upcoming Appointments page';
        $res = $pnotifications->save();
        
        return redirect('doctorspatientappointment');
    }
}
