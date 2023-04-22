<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;


class EditPasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request)
    {
        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }
        return redirect()->route('editpassword')->with('message', 'Profile saved successfully');
    }
}
