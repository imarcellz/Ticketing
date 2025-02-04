<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Show the user's profile information.
     */
    public function showProfile()
    {
        $user = \Illuminate\Support\Facades\Auth::user();  // Mendapatkan data pengguna yang sedang login
        return view('user.profile', compact('user'));
    }
}