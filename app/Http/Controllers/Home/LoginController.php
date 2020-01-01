<?php

namespace App\Http\Controllers\Home;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;

class LoginController extends Controller
{

    public function index(){
        return view('home.login');
    }

    public function loginVail(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        if ($username == 'root' && $password == '123456'){

            session(['username'=>'root']);
            session(['name'=>'总管理员']);
            session(['head_img'=>'1.jpg']);

            return redirect('/');
        }


        return redirect('/login');
    }

    public function LoginOut(){
        session()->flush();

        return redirect('/');
    }
}
