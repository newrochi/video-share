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

    public function create(){
        return view('videos.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>['required'],
            'length'=>['required','integer'],
            'slug'=>['required','unique:videos,slug'],
            'url'=>['required','url'],
            'thumbnail'=>['required','url']
        ]);

        Video::create($request->all());

        return redirect()->route('index')->with('alert',__('messages.success'));
    }
}
