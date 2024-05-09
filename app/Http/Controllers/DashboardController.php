<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            return view('pages.back.dashboardAdmin');
        } elseif (Auth::user()->role == 'writer') {
            return view('pages.back.dashboardWriter');
        } else {
            return view('pages.back.dashboardUser');
        }
    }
}
