<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('name', 'email', 'address', 'telephone_number'));
        return redirect()->route('editprofile')->with('message', 'Profile saved successfully');
    }
}
