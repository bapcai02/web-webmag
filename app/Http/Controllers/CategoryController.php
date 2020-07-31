<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{
    public function getcategory($id){
        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();

        $get_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('news.*', 'categories.name as cate_name','categories.id as id_cate','categories.front as font')
        ->where('id_categories',$id)->Where('news.status','1')
        ->orderByDesc('id')->paginate('6');

        $get_one_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('news.*', 'categories.name as cate_name','categories.id as id_cate','categories.front as font')
        ->where('id_categories',$id)->Where('news.status','1')
        ->orderByDesc('id')->limit(1)->get();

        $count_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('categories.name as cate_name','categories.id as cate_id','categories.front as font',DB::raw('sum(news.id_categories) as sum' ))->groupBy('id_categories')
        ->where('news.status','1')->get();
        
        $post_random = DB::table('news')->inRandomOrder()->limit(6)->get();

        return view('frontend.page.category',compact('get_one_category','count_category','category','new_category','get_category','post_random'));
    }
}
