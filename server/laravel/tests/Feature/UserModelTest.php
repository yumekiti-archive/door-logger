<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Assert;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function testユーザーを作成することができるか()
    {
        $user = User::factory()->create();
        Assert::assertNotNull($user);

    }

    public function testデバイスを作成することができるか()
    {
        $user = User::factory()->create();
        $device = $user->createDevice('ほげーー');
        Assert::assertNotNull($device);
    
    }
}
