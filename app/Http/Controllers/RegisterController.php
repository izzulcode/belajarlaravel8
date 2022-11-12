<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:225', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // cara 1
        // $validateData['password'] = bcrypt($validateData['password']);
        // cara 2
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

// $request->session()->flash('success','Registration suksek mohon login');

// bisa bisa message nya kirim sekalian redirect 
        return redirect('/login')->with('success','Registration sukses mohon login');
    }
}
