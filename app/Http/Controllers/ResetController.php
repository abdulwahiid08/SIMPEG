<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function store(Request $request, $id)
    {
        User::find($id)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()
                ->with('pesan', 'Password berhasil di Reset');
    }
}
