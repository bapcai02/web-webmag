<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::all();
        return response()->json($category,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|min:3',
            'front' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $data['name'] = $request->name;
        $data['status'] = $request->status; 
        $data['front'] = $request-> front;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $category_save = Categories::create($data);

        return response()->json($category_save,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_one = Categories::find($id);
        if(is_null($category_one)){
            return response()->json(["message"=>"Recod Not Found"],404);
        }
        return response()->json($category_one,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $category_update = Categories::find($id);

            $rule = [
                'name' => 'required|min:3',
                'front' => 'required|min:3',
            ];

            $validator = Validator::make($request->all(),$rule);

            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }

            $data['name'] = $request->name;
            $data['status'] = $request->status; 
            $data['front'] = $request-> front;
            $data['updated_at'] = Carbon::now();

            if(is_null($category_update)){
                return response()->json(["message"=>"Recod Not Found"],404);
            }
            $category_update->update($data);

            return response()->json($category_update,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_update = Categories::find($id);
        if(is_null($category_update)){
            return response()->json(["message"=>"Recod Not Found"],404);
        }
        $category_update->delete();
        return response()->json($category_update,200);
    }
}
