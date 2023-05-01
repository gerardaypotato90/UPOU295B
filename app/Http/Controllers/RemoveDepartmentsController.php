<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctorpatientlist;
use App\Models\doctorslist;
use App\Models\department;
use App\Models\User;
use Hash;
use Session;
use Auth;


class RemoveDepartmentsController extends Controller
{
    public function index()
    {
        $departments = department::all();
        return view('removedepartments', compact('departments'));
    }
    public function remove($id)
    {
        $departments = department::where('id', $id);
        $departments->delete();
        return view('removedepartments', compact('departments'));
    }
}
