<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboarController extends Controller
{
    public function index()
    {
        return view('website.dashboard.home');
    }
}
