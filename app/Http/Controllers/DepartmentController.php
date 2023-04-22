<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;

class DepartmentController extends Controller
{
    public function adddept(Request $request)
    {
        $request->validate([
            'department' => ['required', 'string', 'max:255'],
        ]);

        $dept = new department();       
        $dept->departmentname = $request->department;
        $res = $dept->save();

        return back()->with("success", "Records saved successfully");
    }
}
