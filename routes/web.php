<?php

use App\Events\VideoCreated;
use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\DislikesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VideosController;
use App\Http\Middleware\CheckVerifyEmail;
use App\Jobs\otp;
use App\Jobs\ProcessVideo;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Video;
use App\Notifications\VideoProcessed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/videos/create',[VideosController::class,'create'])->middleware('email.verified')->name('videos.create');
Route::post('/videos',[VideosController::class,'store'])->name('videos.store');
Route::get('/videos/{video}',[VideosController::class,'show'])->name('videos.show');
Route::get('/videos/{video}/edit',[VideosController::class,'edit'])->name('videos.edit');
Route::post('/videos/{video}',[CategoryVideoController::class,'update'])->name('videos.update');

Route::get('/categories/{category:slug}/videos',[CategoryVideoController::class,'index'])->name('categories.videos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Route::get('/jobs',function(){
    otp::dispatch();
}); */

Route::get('/verify',function(){
    Mail::to('aaa@yahoo.com')->send(new VerifyEmail(User::first()));
});

Route::get('/event',function(){
    $video=Video::first();
    VideoCreated::dispatch($video);
});

Route::get('/notify',function(){
    $user=User::first();
    $video=Video::first();
    $user->notify(new VideoProcessed($video));
});

Route::post('videos/{video}/comments',[CommentController::class,'store'])->name('comments.store');

//Route::get('video/{video}/like',[LikeController::class,'store'])->name('videos.like');

Route::get('{likeable_type}/{likeable_id}/like',[LikeController::class,'store'])->name('likes.store');
Route::get('{likeable_type}/{likeable_id}/dislike',[DislikeController::class,'store'])->name('dislikes.store');

