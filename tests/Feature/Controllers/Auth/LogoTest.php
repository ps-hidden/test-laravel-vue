<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Model\User;

class LogoTest extends TestCase
{
    private static $user;
    private static $logo;

    public function testUpload()
    {
        self::$user = factory(User::class)->create();
        auth()->onceUsingId(self::$user->id);

        $this->post('/rest/auth/logo', ['logo' => UploadedFile::fake()->image('logo.png')])
             ->assertStatus(200);

        self::$logo = User::find(self::$user->id)->logo;

        $this->assertNotNull(self::$logo);

        $this->assertTrue(\Storage::disk('public')->exists(self::$logo));
    }

    public function testDelete()
    {
        auth()->onceUsingId(self::$user->id);

        $this->delete('/rest/auth/logo')
             ->assertStatus(200);

        $this->assertNull(User::find(self::$user->id)->logo);

        $this->assertFalse(\Storage::disk('public')->exists(self::$logo));
    }
}
