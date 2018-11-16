<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $info = DB::table('info')->orderBy('id','desc');
        return view('main',['info'=>$info]);
        //return view('main');
    }
    public function gallery(){
        return view('gallery');
    }
}
