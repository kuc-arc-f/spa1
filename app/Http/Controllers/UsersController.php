<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Libs\AppConst;

use App\User;
//
class UsersController extends Controller
{
    /*
    public function login(){
        return view('users/login');
    }
    public function logout(){
        session_start();
        $const = new AppConst;
        $_SESSION[$const->sessParam_user] = null;
        var_dump("#completem logout");
        exit();
    }
    */
    //
    public function auth(Request $request ){
        $email   = request('email');
        $password= request('password');
//var_dump( $password );
        $query = User::query();
        $query->where('email', $email);
        $user = $query->first();
        if (Hash::check($password, $user->password)) {
            $const = new AppConst;
            session_start();
            $_SESSION[ $const->sessParam_user ]= $user;
            //OK
//var_dump($password );
            return redirect('/');
        }else{
            return redirect('/users/login');
            //NG
        }
    }
    //
    public function test(){
        $const = new AppConst;
        session_start();
        var_dump( $_SESSION[$const->sessParam_user]->email );
    	exit();
    }
}
