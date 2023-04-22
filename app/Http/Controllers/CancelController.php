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

class CancelController extends Controller
{
    public function cancel($pid, $id)
    {
        $drsched =  DB::select('select * from doctorspatientappointments where id='.$id.' and patientid ='.$pid.' and status ="Approved/Active"');
        $users =  DB::select('select * from users where id = '.$drsched[0]->doctorid.'');
        $docapp = doctorspatientappointment::where('patientid', $pid)
            ->where('doctorid', $drsched[0]->doctorid)
            ->where('id', $id)
            ->first();
        $plist = patientdoctorlist::where('patientid', $pid)
            ->where('doctorid', $drsched[0]->doctorid)
            ->where('doctorspatientappointmentid', $id)
            ->first();
        $drplist = doctorpatientlist::where('patientid', $drsched[0]->patientid)
            ->where('doctorid', $drsched[0]->doctorid)
            ->where('doctorspatientappointmentid', $docapp->id)
            ->where('patientdoctorlistsid', $plist->id)
            ->first();

        if ($docapp) {
            $docapp->status = 'Cancel';
            $docapp->save();
        }
        if ($plist) {
            $plist->status = 'Cancel';
            $plist->save();
        }
        if ($drplist) {
            $drplist->status = 'Cancel';
            $drplist->save();
        }
        
        return redirect('doctorspatientappointment');
    }
}
