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

    protected $appends = ['latest_log'];

    public function logs()
    {
        return $this->hasMany(DoorLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function openDoor()
    {
        return $this->logs()->create(['is_open' => true]);


    }

    public function closeDoor()
    {
        return $this->logs()->create(['is_open' => false]);

    }

    /**
     * tokenを生成します。
     */
    public function generateToken()
    {
        $this->token = hash('sha256', Str::random(10));
        return $this->save();
    }

    public function getLatestLogAttribute()
    {

        return $this->logs()->orderBy('id','desc')->first();

    }

}
