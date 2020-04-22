<?php

namespace Tests\Unit;

use App\{User,Session};
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
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
        $newUserCreated = User::where(['email'=>$newEmail])->first();
        $this->assertTrue((bool)$newUserCreated);
        if($newUserCreated){
            Session::where('user_id',$newUserCreated->id)->delete();
            $newUserCreated->delete();
        }
    }
}
