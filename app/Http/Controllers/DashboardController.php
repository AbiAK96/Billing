<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view('pages/dashboard');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}
