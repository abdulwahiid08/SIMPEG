<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            'data' => $user
        ]);
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'foto' => 'mimes:png,jpg,jpeg|file|max:5024',
        ]);

        if ($request->file('foto')) {
            $attr['foto'] = $request->file('foto')->store('profile-foto'); // , $getNameFile
            auth()->user()->update($attr);
        }

        // $data = $request->all();
        auth()->user()->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect()
                ->route('dashboard')
                ->with('pesan', 'Profile Anda Berhasil di Edit');
    }
}
