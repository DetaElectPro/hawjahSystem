<?php

namespace Tests\Unit;

use App\User;
use Monolog\Handler\SyslogUdp\UdpSocket;
use Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_create_a_carousel()
    {
        $data = [
            'name' => $this->faker->word,
            'email' => $this->faker->email,
            'phone' => $this->faker->phone,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ];

        $userData = new User($data);
        $userData = $userData->save();

        $this->assertInstanceOf(UdpSocket::class, $userData);
        $this->assertEquals($data['name'], $userData->name);
        $this->assertEquals($data['phone'], $userData->phone);
//        $this->assertEquals($data['image_src'], $userData->src);
    }
}
