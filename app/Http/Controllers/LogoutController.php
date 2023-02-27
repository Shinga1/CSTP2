<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request){
        auth()->logout();

        $request->session()->flush();
        return redirect('/');
    }
}
