<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register User',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

         $attr['password'] = Hash::make($attr['password']);

        User::create($attr);

        return redirect('/login')->with('success', 'berhasil registrasi');
    }
}
