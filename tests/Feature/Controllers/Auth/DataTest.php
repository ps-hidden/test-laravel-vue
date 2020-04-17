<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use App\Model\User;

class DataTest extends TestCase
{
    private static $user;
    private $email = 'test@test.test';
    private $name = 'New Name';
    private $password = 'New Password';

    public function testIndex()
    {
        self::$user = factory(User::class)->create();
        auth()->loginUsingId(self::$user->id);

        $this->put('/rest/auth/data', [
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ])->assertStatus(200);
    }

    public function testCheck()
    {
        $user = User::find(self::$user->id);

        $this->assertTrue($user->name == $this->name);

        $this->assertTrue(\Hash::check($this->password, $user->password));

        $this->assertFalse($user->email == $this->email);
    }

}
