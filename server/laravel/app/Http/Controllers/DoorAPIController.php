<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoorRequest;

class DoorAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.device');
    }

    public function door(DoorRequest $request)
    {
        if($request->input('is_open')){
            $request->device->openDoor();
        }else{
            $request->device->closeDoor();
        }

        return $device->load('latestLog');
    }
}

