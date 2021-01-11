<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function showUserName(){
        return 'Anas Ashraf';
    }

    public function getIndex(){
        $object=new \stdClass();
        $object->name='ashraf';
        $object->id=5;
        $object->gender='male';

        $data=[/* 'a' => 'anas','b' => 'bayoumi' */];
        return view('welcome',compact('data'));
    }
}
