<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\collection;

class HomeController extends Controller
{
    public function index(){
        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();
        
        $new_post = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->orderByDesc('id')->limit(2)->get();

        $new_post_recent = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->orderByDesc('id')->skip(2)->take(6)->get();

        $new_post_talk = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->where('id_newcate',18)->orWhere('news.status','1')
        ->orderByDesc('id')->take(3)->get();

        $new_post_dev = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('news.*', 'categories.name as cate_name','categories.id as id_cate','categories.front as font')
        ->where('id_categories',2)->orWhere('news.status','1')
        ->orderByDesc('id')->take(3)->get();

        $new_post_tech = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('news.*', 'categories.name as cate_name','categories.id as id_cate','categories.front as font')
        ->where('id_categories',1)->orWhere('news.status','1')
        ->orderByDesc('id')->take(3)->get();

        $new_post_most_read = DB::table('news')->join('news_category', 'news.id_newcate', '=', 'news_category.id')
        ->select('news.*', 'news_category.name as cate_name','news_category.id as id_cate','news_category.font as font')
        ->where('news.status',1)
        ->orderByDesc('view')->take(6)->get();

        $count_category = DB::table('news')->join('categories', 'news.id_categories', '=', 'categories.id')
        ->select('categories.name as cate_name','categories.id as cate_id','categories.front as font',DB::raw('sum(news.id_categories) as sum' ))->groupBy('id_categories')
        ->where('news.status','1')->get();
        
        return view('frontend.page.home',compact('category','new_category','new_post','new_post_recent','new_post_talk','new_post_most_read'
                    ,'new_post_dev','new_post_tech','count_category'));
    }
}
