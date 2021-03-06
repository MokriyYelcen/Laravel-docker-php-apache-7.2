<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Mockery\Exception;
use App\{User,Session};
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function index()
    {
        //Auth::user()->id
//        return response()->json(unserialize(base64_decode(Session::where('user_id',Auth::user()->id)->first()->payload)));
//        $password = Hash::info(Auth::user()->password);

//        return response()->json($this->eq_roots(1,-2,-3));

        return response()->json($this->eq_roots(0,0,15));
//        return response()->json($this->eq_roots(1,12,36));
    }
    public function eq_roots($a = 0,$b = 0 ,$c = 0) {

        if ($a == 0) {
            if( $b == 0 && $c == 0)return [0,0];else return [false,false];
        }

        if ($b==0) {
            if ($c<0) {
                $x1 = sqrt(abs($c/$a));
                $x2 = sqrt(abs($c/$a));
            } elseif ($c==0) {
                $x1 = $x2 = 0;
            } else {
                $x1 = sqrt($c/$a).'i';
                $x2 = -sqrt($c/$a).'i';
            }
        } else {
            $d = $b*$b-4*$a*$c;
            if ($d>0) {
                $x1 = (-$b+sqrt($d))/2/$a;
                $x2 = (-$b-sqrt($d))/2/$a;
            } elseif ($d==0) {
                $x1 = $x2 = (-$b)/2/$a;
            } else {
                $x1 = -$b . '+' . sqrt(abs($d)) . 'i';
                $x2 = -$b . '-' . sqrt(abs($d)) . 'i';
            }
        }
        return array($x1, $x2);
    }
}
