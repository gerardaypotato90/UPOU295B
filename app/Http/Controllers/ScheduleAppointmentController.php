<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorslist;
use App\Models\department;

class ScheduleAppointmentController extends Controller
{
    //
    public function doclist(Request $request)
    {

        $query = $request->input('query');

        $results = DB::table('doctorslists')
                    ->where('department', '=', $query)
                    ->get();
        
        $departments = department::all();

        return view('scheduleappointment')->with([
            'drlist' => $results,
            'departments' => $departments,
        ]);
        
    }
}
