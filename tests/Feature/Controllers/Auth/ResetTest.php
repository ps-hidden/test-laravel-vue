<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Model\User;

class ResetTest extends TestCase
{
    private static $user;

    public function testForgot()
    {
        self::$user = factory(User::class)->create();

        $this->post('/rest/auth/forgot', ['email' => self::$user->email])
             ->assertStatus(200);

        $this->assertDatabaseHas('password_resets', ['email' => self::$user->email]);
    }
}
