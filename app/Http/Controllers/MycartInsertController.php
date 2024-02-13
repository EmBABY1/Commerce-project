<?php

namespace App\Http\Controllers;
use App;
use DB;
use id;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MycartInsertController extends Controller
{

  public function insertData(Request $request)
  {
   
    
    $product_id = $request->input('product_id');
   $cart_quantity = $request->input('cart_quantity');
   $price = $request->input('price')*$cart_quantity;
      $data=array('user_id'=>Auth::id(),"product_id"=>$product_id,"cart_quantity"=>$cart_quantity,"price"=>$price);
      $result = DB::select('select * from mycart where product_id='.$product_id);
      if($result)
      {
        DB::update('update mycart set cart_quantity = cart_quantity + '.$cart_quantity.',price=price+'.$price.' where product_id = ?', [$product_id]);
        echo "<script type='text/javascript'>alert('your item has been updated to your cart successfully');</script>";    
      }
      else
      {
        $data=array('user_id'=>Auth::id(),"product_id"=>$product_id,"cart_quantity"=>$cart_quantity,"price"=>$price);
        DB::table('mycart')->insert($data);
       
      }
      
       DB::update('update product SET quantity= quantity -'. $cart_quantity . ' WHERE id='.$product_id);
      
       return view('/welcome');
  }
  public function updateData(Request $request)
  {
    $product_id = $request->input('product_id');
    $cart_quantity= $request->input('cart_quantity');
    DB::update('update product SET quantity= quantity +'.$cart_quantity.' WHERE id='.$product_id);
    DB::delete('delete from mycart where product_id ='.$product_id);

    echo "<script type='text/javascript'>alert('your item has been removed from your cart successfully');</script>";    
      return view('/welcome');
  }
  public function checkoutfun(Request $request)
  {
    $s=0;
 
    $product_id = $request->input('product_id');
  
    
    
    $price = $request->input('price');
    $selectedItems = $request->input('items', []); // Get selected items array

    if($selectedItems)
    {
     
      $result  = DB::table('mycart as my')
      ->select('p.*','my.cart_quantity','my.product_id','my.price','p.name') // here you can add column names which you need in output
      ->leftJoin('product as p', 'p.id', '=', 'my.product_id')
      ->where('my.user_id',Auth::id())
      ->whereIn('my.product_id', $selectedItems)// here if you need data by id of user then use u.id in where insead of or.id
      ->get();
  
      
   
     return view('checkout',['mycart'=>$result]);
      
    }
   
  }
}?>