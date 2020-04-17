<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use App\Model\User;

class LoginTest extends TestCase
{
    public function testSignIn()
    {
        $user = factory(User::class)->create();

        $this->post('rest/auth', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertStatus(200);

        $auth = $this->get('rest/auth')->json();

        $this->assertTrue(
            empty(
                array_diff_assoc($auth, $user->toArray())
            )
        );
    }

    public function testSignUp()
    {
        $user = factory(User::class)->make();

        $this->post('rest/auth/sign-up', [
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password,
            'name' => $user->name,
        ])->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name
        ]);
    }
}
