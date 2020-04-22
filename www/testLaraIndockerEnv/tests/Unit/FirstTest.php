<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{User,Session};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class FirstTest extends TestCase
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
//    public function testExample()
//    {
//        Session::where('user_id',7)->delete();
//        $response = $this->post('/login',[
//            'email'=> 'unitTest@mail.com',
//            'password'=> '11111111',
//        ]);
//        $response->assertStatus(302);
//        $this->assertTrue((bool)Session::where(['user_id'=>7])->count());
//    }
//    public function testExample()
//    {
//        $newEmail = Str::random(10).'@maisl.com';
//        $response = $this->post('/register',[
//            'name'=> 'thirdd',
//            'email'=> $newEmail,
//            'password'=> '11111111',
//            'password_confirmation'=> '11111111'
//        ]);
//        $response->assertStatus(302);
//        $this->assertTrue((bool)User::where(['email'=>$newEmail])->count());
//    }
}
