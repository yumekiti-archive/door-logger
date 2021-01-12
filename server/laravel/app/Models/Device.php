<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoorLog;

class Device extends Model
{
    use HasFactory;

    public function logs()
    {
        return $this->hasMany(DoorLog::class);
    }
}
