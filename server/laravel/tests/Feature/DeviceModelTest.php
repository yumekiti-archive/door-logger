<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Device;
use App\Models\User;
use PHPUnit\Framework\Assert;

class DeviceModelTest extends TestCase
{
    use RefreshDatabase;


    public function testデバイスを作成することはできるか()
    {
        $device = Device::factory()->create(['user_id' => User::factory()->create()->id]);
        Assert::assertNotNull($device);
    }

    public function testOpenDoorは機能しているか()
    {
        $device = Device::factory()->create(['user_id' => User::factory()->create()->id]);
        
        $open = $device->openDoor();
        Assert::assertNotNull($open);
        Assert::assertTrue($open->is_open);
        
    }

    public function testCloseDoorは機能しているか()
    {
        $device = Device::factory()->create(['user_id' => User::factory()->create()->id]);

        $log = $device->closeDoor();
        Assert::assertNotNull($log);
        Assert::assertFalse($log->is_open);
    }

    public function testGenerateTokenは機能しているか()
    {
        $device = Device::factory()->create(['user_id' => User::factory()->create()->id]);
        Assert::assertTrue($device->generateToken());
        Assert::assertNotNull($device->token);
    }

    public function testLatestLogは取得できるか()
    {
        $device = Device::factory()->create(['user_id' => User::factory()->create()->id]);
        for($i = 0; $i < 10; $i++){
            if($i % 2){
                $device->openDoor();
            }else{
                $device->closeDoor();
            }
        }
        $this->assertNotNull($device->latest_log);
    }
}
