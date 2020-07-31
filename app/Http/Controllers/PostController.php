<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
        public function all_post(){
                $post = DB::table('news')->orderBy('id','desc')->paginate(5);
                return view('backend.pages.all_post',compact('post'));
        }
        public function add_post(){
                $category = DB::table('categories')->get();
                $newcate = DB::table('news_category')->get();
                return view('backend.pages.add_post',compact('category','newcate'));
        }
        public function save_post(Request $request){
            $data = array();
            $data['id_categories'] = $request->category;
            $data['id_newcate'] = $request->new_cate;
            $data['name'] = $request->name;
            $data['title'] = $request->title;
            $data['status'] = $request->status;
            $data['content'] = $request->posts;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            $fileExtension = $request->file('image')->getClientOriginalExtension(); 
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            $uploadPath = public_path('backend/images/post');
            $request->file('image')->move($uploadPath, $fileName);
            $data['image']=$fileName;
            DB::table('news')->insert($data);
            return redirect('all-post')->with('message','thêm bài viết thành công');
        }
        public function edit_type($id){

    
                $type = DB::table('type')->join('product','type.product_id','product.id')->where('product_id',$id)->get();
                return view('backend.pages.edit_type',compact('type'));

        }
        public function update_size($id, Request $req){
                $data = array();
                $data['product_id'] = $req->product;
                $data['posts'] = $req->posts;
                $data['updated_at'] = Carbon::now();
        
                DB::table('type')->where('id',$id)->update($data);
        
                return   redirect('all-type')->with('message', 'Sửa thành công');

        }
    }
