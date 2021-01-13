<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceAPIController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.device');
    }

    public function show(Request $request)
    {
        return $request->device;
    }
}
