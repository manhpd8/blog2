<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
class NewsController extends Controller
{
    public function getAdd(){
    	$data['categorys'] = DB::table('blog_category')->distinct()->get()->toArray();
    	return view('admin.news.add', isset($data)? $data:NULL);
    }

    public function postAdd(Request $request){
 
        $rules = [
                    'name'=>'required',
                    //'img'=>'required',
                    'content'=>'required'
        ];

        $messages = [
                    'name.required'=>'tiêu đề bài viết không được để trống',
                    //'img.required'=>'ảnh bài viết không được để trống',
                    'content.required'=>'nội dung bài viết không được để trống'
        ];

        $Validator = Validator::make($request->all(),$rules,$messages);

        if($Validator->fails()){
            echo "loi validator";
        }else{
            Session::flash('success','');
            Session::flash('error','');
            $arr['news_name'] = $request->name;
            $arr['news_slug'] = str_slug($request->name);
            $arr['cat_id'] = $request->cat_id;
            $arr['news_author']= $request->author;
            $arr['news_content'] = $request->content;
            $arr['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
            echo "đang them".strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
            if(strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION))=='png'){
                $arr['news_img'] = $_FILES['img']['name'];
                $name ='img';
	            $file_name = $request->file($name)->getClientOriginalName();
	            // Lưu file vào thư mục upload với tên là biến $filename
	            $request->file($name)->move('img',$file_name);
                DB::table('blog_news')->insert($arr);
                echo "them thanh cong";
                Session::flash('success','thêm bài viết thành công');
                return redirect()->back();
            }

            else{
                Session::flash('error','ảnh không đúng định dạng');
                echo "them loi";
                //return redirect()->back();
            }

        }
 
    }

    public function getNewsByCatId($cat_id){
        $data['listNews'] = DB::table('blog_news')->where('cat_id',$cat_id)->get()->toArray();
        $data['categories'] = DB::table('blog_category')->distinct()->take(7)->get()->toArray();
        $data['newspost'] = DB::table('blog_news')->orderby('created_at','desc')->take(10)->get()->toarray();
        $data['category'] = DB::table('blog_category')->where('cat_id',$cat_id)->first();
        if($data['listNews'] ==null){
            return view('404');
        }
        return view('category',$data);
    }

    public function getPost(){
        return view('post');
    }

    public function getNewsById($news_id){
        $data['news'] = DB::table('blog_news')->where('news_id',$news_id)->first();
        $data['categories'] = DB::table('blog_category')->distinct()->take(7)->get()->toArray();
        $data['newspost'] = DB::table('blog_news')->orderby('created_at','desc')->take(10)->get()->toarray();
        if($data['news'] ==null){
            return view('404');
        }
        return view('post',$data);
    }

    public function getEdit(){
        $data['listNews'] = DB::table('blog_news')->get()->toArray();
        $data['categories'] = DB::table('blog_category')->get()->toArray();
        return view('editnews',$data);
    }
    public function postEdit(){
        die('Hello world');
        $news_id = $request->input('news_id');
        echo "sdsdfsf";
        echo $news_id;
        return view('editnews');
    }

}
