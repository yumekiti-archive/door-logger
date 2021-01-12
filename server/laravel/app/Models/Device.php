<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoorLog;
use App\Models\User;

class Device extends Model
{
    use HasFactory;

    public function logs()
    {
        return $this->hasMany(DoorLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
