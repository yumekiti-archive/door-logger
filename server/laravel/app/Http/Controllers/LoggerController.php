<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoorRequest;
use App\Models\User;
use App\Models\Device;

class LoggerController extends Controller
{
    //
    public function index()
    {
        $devices = Device::all();
        $user = Auth::user();

        return view("index", ['user' => $user, 'devices' => $devices]);
    }

    public function devices()
    {
        return view("deviceAdd");
    }

    public function deviceAdd(Request $req)
    {

        $user = Auth::user();

        $device = $user->createDevice(
            $req->input('device_name')
        );

        $device->generateToken();

        return redirect('/');
    }
}
