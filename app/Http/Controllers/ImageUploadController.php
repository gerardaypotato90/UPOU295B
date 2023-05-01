<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upload;
use Carbon\Carbon;

class ImageUploadController extends Controller
{
    public function create($patientid, $doctorid)
    {
        $user =  DB::select('select * from users where id ='.$patientid.'');
        $photos = upload::where('doctorid', '=', $doctorid)
                        ->where('patientid', '=', $patientid)
                        ->get();
        return view('upload')->with([
            'patientid' => $patientid,
            'doctorid' => $doctorid,
            'photos' => $photos,
            'user' => $user,
        ]); 
    }

    public function store(Request $request, $patientid, $doctorid)
    {
        $request->validate([
            'diagnosis' => ['required', 'string', 'max:255'],
        ]);
        $patientlists =  DB::select('select distinct patientid, doctorid, doctorname, patientname, department  FROM doctorpatientlists WHERE patientid='.$patientid.' AND doctorid='.$doctorid.' ;');

        $currentDateTime = Carbon::now();
        $size = $request->file('image')->getSize();
        $imagename = $request->file('image')->getClientOriginalName();
        $finalimagename = $patientlists[0]->patientname . '-' . $currentDateTime . '-' . $imagename;

        $request->file('image')->storeAs('public/images/', $finalimagename);
        $photo = new upload();
        $photo->doctorid = $patientlists[0]->doctorid;
        $photo->doctorname = $patientlists[0]->doctorname;
        $photo->patientid = $patientlists[0]->patientid;
        $photo->patientname = $patientlists[0]->patientname;
        $photo->imagename = $finalimagename;
        $photo->diagnostic = $request->diagnosis;
        $photo->size = $size;
        $photo->save();
        return redirect()->back();
    }
}
