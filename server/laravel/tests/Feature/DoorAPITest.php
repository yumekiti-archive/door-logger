<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Device;
use App\Models\User;
use PHPUnit\Framework\Assert;

class DoorAPITest extends TestCase
{
    
    use RefreshDatabase;

    public $device;

    public function setUp(): void
    {
        parent::setUp();

        // テスト用のデバイスを作成します。
        $this->device = Device::factory()->create(['user_id' => User::factory()->create()->id]);
        $this->device->generateToken();
 
        Device::factory()->count(20)->create(['user_id' => User::factory()->create()->id]);
    }

    public function testTokenが正常に機能しているかをテストする()
    {
        $token = $this->device->token;

        $res = $this->get('/api/device', ['Authorization' => 'Bearer ' . $token]);
        $res->assertStatus(200)
            ->assertJson([
                'id' => $this->device->id
            ]);
    }

    public function test不正なTokenを弾くことができているかテストする()
    {
        $illegalToken = 'hogehoge';
        $res = $this->get('/api/device', ['Authorization' => 'Bearer ' . $illegalToken, 'Accept' => 'application/json']);
        $res->assertStatus(401);
    }

    public function testOpenDoor()
    {
        $token = $this->device->token;
        $res = $this->post('/api/device/door', ['is_open' => true], ['Authorization' => 'Bearer ' . $token]);
        $res->assertStatus(200);
        $log = $this->device->logs()->orderBy('id', 'desc')->first();
        Assert::assertEquals(true, $log->is_open);
    }

    public function testCloseDoor()
    {
        $token = $this->device->token;
        $res = $this->post('/api/device/door', ['is_open' => false], ['Authorization' => 'Bearer ' . $token]);
        $res->assertStatus(200);
        $log = $this->device->logs()->orderBy('id', 'desc')->first();
        Assert::assertNotNull($log);
        Assert::assertEquals(false, $log->is_open);
    }
}
