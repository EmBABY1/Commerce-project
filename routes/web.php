<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

// for all users

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        $id = Auth::id();
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
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/news', function () {
        return view('news');
    });
    Route::get('/cart/{id}', function ($id) {
        $result= DB::table('product')->where('id',$id)->get();
      // dd($result);
    
        return view('cart',['products'=>$result]);
    });
    Route::get('/checkout', function () {
       // $result= DB::table('product')->where('category_id',$cat_id)->get();
      // dd($result);
    
        return view('checkout');
    });
    
});




    // for admin

    Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('insert',[App\Http\Controllers\ProductInsertController::class,'insertform']);
    Route::post('create',[App\Http\Controllers\ProductInsertController::class,'insert']);
    Route::get('view-records',[App\Http\Controllers\StudViewController::class,'index']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

