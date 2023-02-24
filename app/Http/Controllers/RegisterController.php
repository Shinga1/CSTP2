<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('register');
    }

    public function registerDone(Request $request) {
        //Validation of inputed data from new user
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,exists,0' ,'max:255'],
            'password' => ['required', 'confirmed','min:8'],
            'password_confirmation' => 'required'
        ]);

        //Puts user information inputted in form into database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/');
    }
}
