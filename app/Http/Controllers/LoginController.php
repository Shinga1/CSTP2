<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{


    public function login() {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('errorMessage', 'Invalid login details');
        }

        return redirect('/');

        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
 
        // if (auth()->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }
 
        // return back()->withErrors([
        //     'username' => 'Incorrect Username or Password!',
        // ])->onlyInput('username');

    }

}