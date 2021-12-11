<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index(){
        $videos=Video::all();
        return $videos;
    }
}
