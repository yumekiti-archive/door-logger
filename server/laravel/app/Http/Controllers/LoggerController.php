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
        $user = User::all();

        return view("index", ['user' => $user, 'devices' => $devices]);
    }

    public function devices()
    {
        return view("deviceAdd");
    }

    public function deviceAdd(DoorRequest $req)
    {
        $device = User::createDevice([
            'device_name' => $req->input('device_name'),
        ]);

        return $device;
    }
}
