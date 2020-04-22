<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\{User,Session};
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function index()
    {
        //Auth::user()->id
//        return response()->json(unserialize(base64_decode(Session::where('user_id',Auth::user()->id)->first()->payload)));
        $password = Hash::info(Auth::user()->password);

        return response()->json($password);
    }

}
