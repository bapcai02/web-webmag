<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contact(){
        $category = DB::table('categories')->get();

        $new_category = DB::table('news_category')->get();

        return view('frontend.page.contact',compact('category','new_category'));
    }
}
