<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\mycart;
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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

*/

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
    Route::get('/mycart/{id}', function ($id) {
        $result  = DB::table('mycart as my')
            ->select('p.*','my.cart_quantity','my.product_id') // here you can add column names which you need in output
            ->leftJoin('product as p', 'p.id', '=', 'my.product_id')
            ->where('my.user_id',$id) // here if you need data by id of user then use u.id in where insead of or.id
            ->get();
        //dd($result);
        return view('mycart',['mycart'=>$result]);
    });

    Route::get('/checkout/{id}', function ($id) {
        $result= DB::table('product')->where('id',$id)->get();
     //  dd($result);
        // Route::post('create',[App\Http\Controllers\MycartInsertController::class,'insertcart']);
      return view('checkout',['products'=>$result]);
     
    });
  
    Route::post('/insertData', [App\Http\Controllers\MycartInsertController::class, 'insertData']);
    Route::post('/updateData', [App\Http\Controllers\MycartInsertController::class, 'updateData']);
    Route::post('/checkoutfun', [App\Http\Controllers\MycartInsertController::class, 'checkoutfun']);
    Route::post('/insert_order_details', [App\Http\Controllers\OrderController::class, 'insert_order_details']);

 
});




    // for admin

    Route::middleware(['auth','isAdmin'])->group(function () {
        Route::get('/insert', function () {
            return view('/prod_create');
        });
   Route::post('create',[App\Http\Controllers\ProductInsertController::class,'insert']);
    Route::get('view-records',[App\Http\Controllers\StudViewController::class,'index']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');