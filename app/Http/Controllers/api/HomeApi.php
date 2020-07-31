<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeApi extends Controller
{

    public function login(Request $request){ 
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], 200 ); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    public function register(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            // 'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
             return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['name'] =  $user->name;
        return response()->json(['success'=>$success],200); 
    }
    public function category(){
        if(Auth::check()){
            $category = Categories::all();
            return response()->json($category,200);
        }
        
    }
    public function categoryFindId($id){
        if(Auth::check()){
            $category_one = Categories::find($id);
            if(is_null($category_one)){
                return response()->json(["message"=>"Recod Not Found"],404);
            }
            return response()->json($category_one,200);
        }    
    }
    public function categorySave(Request $request){
        if(Auth::check()){
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
        
    }
    public function categoryUpdate(Request $request,$id){

        if(Auth::check()){
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
        
    }
    public function categoryDelete(Request $request,$id){
        if(Auth::check()){
            $category_update = Categories::find($id);
            if(is_null($category_update)){
                return response()->json(["message"=>"Recod Not Found"],404);
            }
            $category_update->delete();
            return response()->json($category_update,200);
        }
    }  
}
