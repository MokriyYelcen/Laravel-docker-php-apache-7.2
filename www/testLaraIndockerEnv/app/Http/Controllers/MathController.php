<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function eq_roots($a = 0,$b = 0 ,$c = 0) {

        if ($a == 0) {
            if( $b == 0 && $c == 0)return [0,0];else throw new \Exception('invalid equation');
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

    public function getThirdSide ($a,$b,$alpha){
        if($alpha <= 0 || $alpha >=180){
            return false;
        }
        return sqrt(($a*$a) + ($b*$b) - (2*$a*$b * cos($alpha)));
    }
}
