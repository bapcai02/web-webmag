<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsCategoryController extends Controller
{
    public function getitems($id){
        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();

        $get_one_items = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->where('id_newcate',$id)->Where('news.status','1')
        ->orderByDesc('id')->take(1)->get();

        $get_items = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->where('id_newcate',$id)->Where('news.status','1')
        ->orderByDesc('id')->paginate('6');

        $count_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('categories.name as cate_name','categories.id as cate_id','categories.front as font',DB::raw('sum(news.id_categories) as sum' ))->groupBy('id_categories')
        ->where('news.status','1')->get();
        
        $post_random = DB::table('news')->inRandomOrder()->limit(6)->get();

        return view('frontend.page.itemscategory',compact('category','new_category','get_one_items','get_items','post_random','count_category'));
    }
}
