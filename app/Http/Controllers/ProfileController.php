<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('forntend.profile.show', compact('user'));
    }


    public function edit(User $user)
    {
        return $user;
    }


    public function changePassword(User $user)
    {
        return $user;
    }
}
