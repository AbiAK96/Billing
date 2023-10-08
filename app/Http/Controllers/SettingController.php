<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function appearanceIndex(Request $request)
    {
        try {
            return view('pages/setting/setting-list');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }

    public function cronJobsIndex(Request $request)
    {
        try {
            return view('pages/setting/cronjobs-list');
        } catch (\Throwable $th) {
            return back()->withError("Error!");
        }
    }
}