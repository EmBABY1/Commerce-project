<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function insert_order_details(Request $request){
        
       
        //insert into order_details
        $id=time();
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $comment = $request->input('comment');      
        $payment_method = $request->input('payment_method');
        $data=array('name'=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"comment"=>$comment,"payment_method"=>$payment_method,"id"=>$id);
        DB::table('order_details')->insert($data);
        
        


        //insert into order
        $product_id= $request->input('product_id',[]);
        $product_name= $request->input('product_name',[]);
        $price= $request->input('price',[]);       
        $data = [];
             // Loop through each product, name, and price triple
            for ($i = 0; $i < count($product_id); $i++) {
                $data[] = [
                    'product_id' => $product_id[$i],
                    'product_name' => $product_name[$i],
                    'order_details_id' => $id,
                    'user_id' => Auth::id(),
                    'price' => $price[$i], // Use the corresponding price for the current product
                ];
            }
              // Insert multiple rows into the 'order' table
              DB::table('order')->insert($data);
             
         
         //delete from mycart
         DB::table('mycart')->wherein('product_id',$product_id)->delete();
          
        echo"<script>alert('order inserted');</script>";
        return view('welcome');
    }


}