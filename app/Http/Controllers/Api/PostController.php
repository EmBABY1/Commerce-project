<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $result= PostResource::collection(posts::get());
       // $result= DB::table('category')->get();
        $r=[
            'data'=>$result,
            'status'=>200

        ];
        return response()->json($r, 200, ["hello"]);
    }
    public function show($id)
    {
        $result=posts::find($id);
        if($result)
        {
            $result= new PostResource($result);
            $r=[
                'data'=>$result,
                'status'=>200,
                'message'=>"Found"

            ];
        }
        
        else
        {$r=[
            'data'=>"null",
            'status'=>404,
            'message'=>"not Found"

        ];
       
        }
        return response()->json($r, 200, [""]);
    } 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|',
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Return validation errors with status code 422
        }
        $result= posts::create($request->all());
        if($result)
            return response()->json("done", 200, ["hello"]);
        else
            return response()->json("failed", 404, ["hello"]);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|',
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Return validation errors with status code 422
        }
        
        $post=posts::find($id);
        if($post)
        {
            $post->update($request->all());
            if($post)
                return response()->json("updated", 200, ["hello"]);
            else
                return response()->json("failed", 404, ["hello"]);
        }
        else
        return response()->json(['errors' => 'id isn\'t found'], 404, ["hello"]);
    }
    public function delete($id)
    {
        $post=posts::find($id);
        if($post)
        {
            $post->delete($id);
            if($post)
                return response()->json("deleted", 200, ["hello"]);
            else
                return response()->json("failed", 404, ["hello"]);
        }
        else
        return response()->json(['errors' => 'id isn\'t found'], 404, ["hello"]);
    }
}