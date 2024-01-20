<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductInsertController extends Controller
{
    //
    
        public function insert(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
       
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $category_id = $request->input('category_id');
        if($category_id=="drinks")        {
            $category_id=1;
            $path="assets/img/drinks/";
        }
        else if($category_id=="food")        {
            $category_id=2;
            $path="assets/img/food/";
        }
        else if($category_id=="cameras")        {
            $category_id=6;
            $path="assets/img/cameras/";
        }
        else if($category_id=="watches")        {
            $category_id=5;
            $path="assets/img/watches/";
        }
        else if($category_id=="bags")        {
            $category_id=4;
            $path="assets/img/bags/";
        }
        else if($category_id=="electronics")        {
            $category_id=3;
            $path="assets/img/electronics/";
        }
        $file_extension=$request->photo->getclientoriginalextension();
        $filename=$name.'.'.$file_extension;
        
        $request -> photo -> move($path,$filename);
        $photo = $path.$filename;
        $data=array('name'=>$name,"description"=>$description,"photo"=>$photo,"quantity"=>$quantity,"price"=>$price,"category_id"=>$category_id);
        DB::table('product')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
        }
  
  
}