<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailsController extends Controller
{
    public function getdetails($id){


        DB::table('news')->where('id',$id)->increment('view');

        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();

        $details = DB::table('news')->where('id',$id)->get();

        $post_random = DB::table('news')->inRandomOrder()->limit(6)->get();

        $post_views = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->where('news.status',1)
        ->orderByDesc('view')->take(2)->get();

        $count_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('categories.name as cate_name','categories.id as cate_id','categories.front as font',DB::raw('sum(news.id_categories) as sum' ))->groupBy('id_categories')
        ->where('news.status','1')->get();

        return view('frontend.page.details',compact('category','new_category','details','post_random','post_views','count_category'));
    }
}