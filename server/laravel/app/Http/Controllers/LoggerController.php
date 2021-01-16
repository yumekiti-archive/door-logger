<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoggerController extends Controller
{
    //
    public function index()
    {
        $devices = User::all();

        return view("index", ['devices' => $devices]);
    }

    public function devicesAdd()
    {
        return view("devicesAdd");
    }
}
