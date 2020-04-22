<?php

namespace Tests\Unit;

use App\Session;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        Session::where('user_id',7)->delete();
        $response = $this->post('/login',[
            'email'=> 'unitTest@mail.com',
            'password'=> '11111111',
        ]);
        $response->assertStatus(302);
        $session = Session::where(['user_id'=>7])->first();
        $this->assertTrue((bool) $session);
        $session->delete();
    }
}
