<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckVerifyEmail;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Video;
use App\Services\FFmpegAdaptor;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{

    public function __construct()
    {
        //$this->middleware(CheckVerifyEmail::class,['only'=>'create']);
    }
    public function index(){
        /* if(!auth()->user()->hasVerifiedEmail()){
            return redirect()->route('index');
        } */
        $videos=Video::all();
        return $videos;
    }

    public function create(){
        $categories=Category::all();
        return view('videos.create',compact('categories'));
    }

    public function store(StoreVideoRequest $request){

        (new VideoService)->create($request->user(),$request->all());
        return redirect()->route('index')->with('alert',__('messages.success'));
    }

    public function show(Request $request,Video $video){
        $video->load('comments.user');
        return view('videos.show',compact('video'));
    }
    public function edit(Video $video){
        $categories=Category::all();
        return view('videos.edit',compact('video','categories'));
    }

    public function update(UpdateVideoRequest $request,Video $video){

        (new VideoService)->update($video,$request->all());
        return redirect()->route('videos.show',$video->slug)->with('alert',__('messages.video_edited'));
    }
}
