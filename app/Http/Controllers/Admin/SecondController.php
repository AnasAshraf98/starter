<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class SecondController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showString1');
    }

    public function showString0(){
        return 'show static0';
    }

    public function showString1(){
        return 'show static1';
    }
}
