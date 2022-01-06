<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function index(User $user)
    {
        return view('profile.updatepass', [
            'data' => $user
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        // Mengecek password sebelumnya atau current password benar atau tidak
        if (Hash::check($request->password_lama, Auth::user()->password)) {
            Auth::user()->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()
                    ->route('dashboard')
                    ->with('pesan', 'Password Anda Berhasil Di Update');
        }

        throw ValidationException::withMessages([
            'password_lama' => 'Opss! Password anda salah',
        ]);
    }
}
