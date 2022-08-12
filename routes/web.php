<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/aduan/cari', [PostController::class, 'cari']);

// route untuk halaman login dan request login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth']);

// route untuk halaman register dan request register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// route untuk logut/keluar
Route::post('/logout', [LoginController::class, 'logout']);

// halaman untuk dashboard admin / user
Route::get('/dashboard', function () {
    return view('dashboard/index', [
        'posts' => Post::where('user_id', Auth::user()->id)->get()->count(),
        'post'  => Post::count(),
        'users' => User::count(),
        'kategori'  => Category::count()
    ]);
});

// halaman buat aduan konten;
Route::resource('/dashboard/posts', AduanController::class)->middleware('auth');

// halaman kategori
Route::resource('/dashboard/categories', CategoryController::class)->middleware('akses');

// halaman user
Route::resource('/dashboard/users', UserController::class)->middleware('akses');

// halaman post aduan
Route::resource('/dashboard/post', PostController::class)->middleware('akses');
