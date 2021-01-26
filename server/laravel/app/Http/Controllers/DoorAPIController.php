<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoorRequest;
use App\Models\Device;
use App\Events\DoorEvent;

class DoorAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.device');
    }

    public function door(DoorRequest $request)
    {
        $device = Device::where('token', $request->bearerToken())->first();
        $log;
        if($request->input('is_open')){
            $log = $device->openDoor();
        }else{
            $log = $device->closeDoor();
        }

        \Log::debug("hoge");
        event(new DoorEvent($log));
        return $device;
    }
}
