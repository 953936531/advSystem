<?php

namespace App\Http\Controllers\Home;

use App\Model\Users;
use App\Model\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;

class IndexController extends Controller
{

   public function index(){
       return view('home.index');
   }
}
