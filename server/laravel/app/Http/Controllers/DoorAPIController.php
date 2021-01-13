<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoorRequest;
use App\Models\Device;

class DoorAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.device');
    }

    public function door(DoorRequest $request)
    {
        $device = Device::where('token', $request->bearerToken())->first();
        if($request->input('is_open')){
            $device->openDoor();
        }else{
            $device->closeDoor();
        }

        return $device;
    }
}

