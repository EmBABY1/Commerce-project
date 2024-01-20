<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use id;

class MycartInsertController extends Controller
{

  public function insertData(Request $request)
  {
   
    $price = $request->input('price');
    $product_id = $request->input('product_id');
   $cart_quantity = $request->input('cart_quantity');
      $data=array('user_id'=>Auth::id(),"product_id"=>$product_id,"cart_quantity"=>$cart_quantity,"price"=>$price);
      $result = DB::select('select * from mycart where product_id='.$product_id);
      if($result)
      {
        DB::update('update mycart SET cart_quantity= cart_quantity +'. $cart_quantity . ' WHERE id='.$product_id);
      
      }
      else
      {
        $data=array('user_id'=>Auth::id(),"product_id"=>$product_id,"cart_quantity"=>$cart_quantity,"price"=>$price);
        DB::table('mycart')->insert($data);
      }
      
       DB::update('update product SET quantity= quantity -'. $cart_quantity . ' WHERE id='.$product_id);
      
      
      return response()->json(['message' => 'Data inserted successfully'], 201);
  }
  public function updateData(Request $request)
  {
    $product_id = $request->input('product_id');

      DB::delete('delete from mycart where product_id ='.$product_id);
      
      return response()->json(['message' => 'Data updated successfully'], 201);
  }
}