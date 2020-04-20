<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Support\Str;

class FirstTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $newEmail = Str::random(10).'@maisl.com';
        $response = $this->post('/register',[
            'name'=> 'thirdd',
            'email'=> $newEmail,
            'password'=> '11111111',
            'password_confirmation'=> '11111111'
        ]);
        $response->assertStatus(302);
        $this->assertTrue((bool)User::where(['email'=>$newEmail])->count());
    }
}
