<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\upload;
use Carbon\Carbon;

class ImageUploadController extends Controller
{
    //
    public function create()
    {
        $photos = upload::all();
        return view('upload', compact('photos'));
    }

    public function store(Request $request)
    {
        $currentDateTime = Carbon::now();
        $size = $request->file('image')->getSize();
        $imagename = $request->file('image')->getClientOriginalName();
        $finalimagename = 'test-'. $currentDateTime . '-' . $imagename;

        $request->file('image')->storeAs('public/images/', $finalimagename);
        $photo = new upload();
        $photo->doctorid = 11;
        $photo->doctorname = 'Dr. Juan';
        $photo->patientid = 11;
        $photo->patientname = 'John';
        $photo->imagename = $finalimagename;
        $photo->diagnostic = 'COVID';
        $photo->size = $size;
        $photo->save();
        return redirect()->back();
    }
}
