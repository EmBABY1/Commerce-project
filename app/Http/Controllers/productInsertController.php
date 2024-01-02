<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductInsertController extends Controller
{
    //
    public function insertform(){
        return view('prod_create');
        }
        public function insert(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $file_extension=$request->photo->getclientoriginalextension();
        $filename=time().'.'.$file_extension;
        $path="assets/img/";
        $request -> photo -> move($path,$filename);
        $photo = $path.$filename;
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $category_id = $request->input('category_id');
        if($category_id=="drinks")        {
            $category_id=1;
        }
        else if($category_id=="food")        {
            $category_id=2;
        }
        else if($category_id=="cameras")        {
            $category_id=3;
        }
        else if($category_id=="watches")        {
            $category_id=4;
        }
        else if($category_id=="bags")        {
            $category_id=5;
        }
        else if($category_id=="electronics")        {
            $category_id=6;
        }
        $data=array('name'=>$name,"description"=>$description,"photo"=>$photo,"quantity"=>$quantity,"price"=>$price,"category_id"=>$category_id);
        DB::table('product')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
        }
       
}