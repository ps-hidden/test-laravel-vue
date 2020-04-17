<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testInit()
    {
        $this->get('/rest/init')->assertJsonStructure(['user', 'token', 'options']);
    }

    public function testGet()
    {
        $this->get('/rest/auth')->assertNoContent(200);

        auth()->loginUsingId(1);
        $this->get('/rest/auth')->assertJsonStructure(['id']);
    }
}
