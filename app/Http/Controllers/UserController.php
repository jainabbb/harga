<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'role' => 'required'
        ],[
            'required' => 'Wajib diisi.',
            'unique' => 'Email yang dimasukkan sudah ada.',
            'email' => 'Isian harus berupa email.'
        ]);

        User::create($validatedData);

        return back()->with('status', 'Berhasil menambahkan admin!')->with('alert-type', 'success');
    }
}
