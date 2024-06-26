<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterTranhController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TruyenTranhController;
use App\Http\Controllers\GoogleDrive;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocTruyenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;


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

Route::get('/', [IndexController::class,'home']);
Route::get('/sachtruyen_admin', [LoginController::class,'login'])->name('login');
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug_truyen}/{slug}', [IndexController::class,'xemchapter']);
Route::get('/xem-truyen-tranh/{slug_truyen}/{slug}', [IndexController::class,'xemtruyentranh']);
Route::get('/the-loai/{slug}', [IndexController::class,'theloai']);
Route::get('/truyen-tranh', [IndexController::class,'truyentranh']);
Route::get('/truyen-tranh/{slug}', [IndexController::class,'truyentranh']);
Route::post('/show-tranh', [IndexController::class,'show_tranh']);
Route::get('/tag/{tag}', [IndexController::class,'tag']);

Route::post('/tim-kiem', [IndexController::class,'timkiem']);
Route::post('/timkiem-ajax',[IndexController::class,'timkiem_ajax']);
Route::get('/dang-ky',[IndexController::class,'dangky'])->name('dang-ky');
Route::get('dang-nhap',[IndexController::class,'dangnhap'])->name('dang-nhap');
Route::get('dang-xuat',[IndexController::class,'sign_out'])->name('dang-xuat');
Route::get('yeu-thich',[IndexController::class,'yeu_thich'])->name('yeu-thich');
Route::get('xoayeuthich/{id}',[IndexController::class,'xoayeuthich'])->name('xoayeuthich');
Route::post('login-publisher',[IndexController::class,'login_publisher'])->name('login-publisher');
Route::post('themyeuthich',[IndexController::class,'themyeuthich'])->name('themyeuthich');
Route::post('register-publisher',[IndexController::class,'register_publisher'])->name('register-publisher');

// Auth::routes();
Auth::routes([
  //'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  
]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);
Route::resource('/information', InformationController::class);
Route::resource('/truyentranh', TruyenTranhController::class);
Route::resource('/chaptertranh', ChapterTranhController::class);

///
Route::get('/doc', [DocTruyenController::class, 'index']);
/////


Route::get('chapter_truyentranh/{slug}', [ChapterTranhController::class, 'chapter_truyentranh']);

Route::get('delete-file/{filename}/{extension}/{timestamp}', [ChapterTranhController::class, 'delete_file']);

/////
Route::post('chapter/{chapter}/comment', [CommentController::class, 'store'])->name('comment.store');
/////

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('/storage-link', function(){
    return Artisan::call('storage:link');


});
Route::resource('/user', UserController::class);
Route::get('/phan-vaitro/{id}', [UserController::class,'phanvaitro']);
Route::get('/phan-quyen/{id}', [UserController::class,'phanquyen']);
Route::post('/insert_roles/{id}', [UserController::class,'insert_roles']);
Route::post('/insert_permission/{id}', [UserController::class,'insert_permission']);
Route::post('/insert-permission', [UserController::class,'insert_per_permission']);

    