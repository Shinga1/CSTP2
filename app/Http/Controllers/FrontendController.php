<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.welcome');
    }
    public function home()
    {
        return view('frontend.home');
    }
}