<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorspatientappointment;
use App\Models\doctorpatientlist;
use App\Models\patientdoctorlist;
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

        if ($docapp) {
            $docapp->status = 'Approved/Active';
            $docapp->save();
        }
        if ($plist) {
            $plist->status = 'Approved/Active';
            $plist->save();
        }

        $drpatientlist = new doctorpatientlist();       
        $drpatientlist->patientid = $drsched[0]->patientid;
        $drpatientlist->doctorid =  $drsched[0]->doctorid;
        $drpatientlist->doctorname = $users[0]->name;
        $drpatientlist->doctorspatientappointmentid = $docapp->id;
        $drpatientlist->patientname = $drsched[0]->patientname;
        $drpatientlist->patientdoctorlistsid = $plist->id;
        $drpatientlist->department = $drsched[0]->department;
        $drpatientlist->appointmentdate = $drsched[0]->appointmentdate;
        $drpatientlist->status = "Approved/Active";  
        $res = $drpatientlist->save();
        
        return redirect('doctorspatientappointment');
    }
}
