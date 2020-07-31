<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
    public function about(){
        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();

        $post_random = DB::table('news')->inRandomOrder()->limit(6)->get();

        return view('frontend.page.about',compact('category','new_category','post_random'));
    }
}
