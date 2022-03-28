<?php

use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideosController;
use App\Jobs\otp;
use App\Jobs\ProcessVideo;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Video;
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
Route::get('/videos/create',[VideosController::class,'create'])->name('videos.create');
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
