<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index(){
        $videos=['A','B','C','D'];
        return view('videos')->with('videos',$videos);
    }
}
