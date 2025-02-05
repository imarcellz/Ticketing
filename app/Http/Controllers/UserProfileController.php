<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function showProfile()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('user.profile', compact('user'));
    }
    // Tampilkan form edit profil
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    // Update data profil
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Validasi untuk foto profil jika ada
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif,max:100',
        ]);

        $user = Auth::user(); // Ensure $user is an instance of the User model
        if (!$user instanceof \App\Models\User) {
            throw new \Exception('Authenticated user is not an instance of User model');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->biodata = $request->biodata;  // Menyimpan biodata

        // Menyimpan foto profil jika ada
        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    // Hapus akun (jika diperlukan)
    public function destroy(Request $request)
    {
        $user = $request->user();
        // Validasi password, jika diperlukan, sebelum menghapus akun
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
