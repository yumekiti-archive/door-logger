<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Device;
use App\Models\DoorLog;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => "test",
            "email" => "test@test.jp",
            "password" => Hash::make("testtest"),

        ]);

        $device = $user->devices()->create([
            "device_name" => "Test Device",
            "token" => "4c716d4cf211c7b7d2f3233c941771ad0507ea5bacf93b492766aa41ae9f720d"
        ]);

        $device->closeDoor();
        
    }
}
