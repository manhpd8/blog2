<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    //
    public function getHome(){
    	$data['categories'] = DB::table('blog_category')->take(7)->get()->toArray();
    	$data['newspost'] = DB::table('blog_news')->orderby('created_at','desc')->take(10)->get()->toarray();

    	$data['cate10'] = DB::select('SELECT blog_news.*,blog_category.cat_name FROM laravel_blog.blog_news,blog_category where blog_news.cat_id = blog_category.cat_id and blog_news.cat_id =10  order by created_at desc limit 1');
    	$data['cate1'] = DB::select('SELECT blog_news.*,blog_category.cat_name FROM laravel_blog.blog_news,blog_category where blog_news.cat_id = blog_category.cat_id and blog_news.cat_id =1  order by created_at desc limit 3');
    	//dd($data['cate10']);
    	//die();

    	return view('home',$data);
    }
}
