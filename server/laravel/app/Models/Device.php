<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoorLog;
use App\Models\User;
use Illuminate\Support\Str;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','device_name'];

    public function logs()
    {
        return $this->hasMany(DoorLog::class);
    }

    public function latestLog()
    {
        return $this->logs()->whereRaw('logs.device_id = (select max(id) from logs where logs.device_id = devices.id)');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function openDoor()
    {
        $log = new DoorLog(['is_open' => true]);
        if($this->logs()->save($log)){
            return $log;
        }
        return null;
    }

    public function closeDoor()
    {
        $log = new DoorLog(['is_open' => false]);
        if($this->logs()->save($log)){
            return $log;

        }
        return null;
    }

    /**
     * tokenを生成します。
     */
    public function generateToken()
    {
        $this->token = hash('sha256', Str::random(10));
        return $this->save();
    }

}
