<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/product', function () {
        $result= DB::table('product')->get();
        return view('product',['products'=>$result]);
    });
    Route::get('/category', function () {
        return view('category',['name'=>'fruits']);
    });
    Route::get('/master', function () {
        return view('master');
    });
    Route::get('/shop', function () {
        $result= DB::table('category')->get();
      // dd($result);
    
        return view('shop',['categories'=>$result]);
    });
    Route::get('/product/{cat_id}', function ($cat_id) {
        $result= DB::table('product')->where('category_id',$cat_id)->get();
      // dd($result);
    
        return view('product',['products'=>$result]);
    });
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('API', function () {
        return view('API');
    });
    Route::get('/welcome', function () {
        return view('welcome');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
