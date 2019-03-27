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
            $errors['errors']=$Validator->errors();
            return redirect()->back()->with($errors);

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

    public function getNewsByCatId($cat_id = -1){
       $data = HomeController::getData();
        if($cat_id <0){
            return view('allCategory',$data);
        }
        $data['category'] = DB::table('blog_category')->where('cat_id',$cat_id)->first();
        $data['listNews'] = DB::table('blog_news')->where('cat_id',$cat_id)->get()->toArray();
        
        return view('category',$data);
    }

    public function getPost(){
        return view('post');
    }

    public function getNewsById($news_id){
        $data = HomeController::getData();
        $data['news'] = DB::table('blog_news')->where('news_id',$news_id)->first();
        
        #update so luot view
        $news_seen = $data['news']->news_seen;
        $news_seen++;
        DB::table('blog_news')->where('news_id',$news_id)->update(['news_seen' => $news_seen]);
        return view('post',$data);
    }

    public function getEdit(){
        $data['listNews'] = DB::table('blog_news')->get()->toArray();
        $data['categories'] = DB::table('blog_category')->get()->toArray();
        return view('admin.news.edit',$data);
    }
    public function postEdit(Request $request){
        $rules = [
                    'news_name'=>'required',
                    //'img'=>'required',
                    'news_content'=>'required'
        ];

        $messages = [
                    'news_name.required'=>'tiêu đề bài viết không được để trống',
                    //'img.required'=>'ảnh bài viết không được để trống',
                    'news_content.required'=>'nội dung bài viết không được để trống'
        ];

        $Validator = Validator::make($request->all(),$rules,$messages);

        if($Validator->fails()){
            echo "loi validator";
            $errors['errors']=$Validator->errors();
            return redirect()->back()->with($errors);
        }else{
            Session::flash('success','');
            Session::flash('error','');
            $news_id = $request->news_id;
            $arr['news_name'] = $request->news_name;
            $arr['news_slug'] = str_slug($request->news_name);
            $arr['cat_id'] = $request->cat_id;
            $arr['news_author']= $request->news_author;
            $arr['news_content'] = $request->news_content;
            $arr['updated_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
            // if(strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION))=='png' || true){
                //$arr['news_img'] = $_FILES['img']['name'];
                // /$name ='img';
                //$file_name = $request->file($name)->getClientOriginalName();
                // Lưu file vào thư mục upload với tên là biến $filename
                //$request->file($name)->move('img',$file_name);
                DB::table('blog_news')->where('news_id',$news_id)->update($arr);
                echo "them thanh cong";
                Session::flash('success','update bai viet viết thành công');
                return redirect()->back();
            //}

            // else{
            //     Session::flash('error','ảnh không đúng định dạng');
            //     echo "them loi";
            //     //return redirect()->back();
            // }

        }
    }

    public function postDel($news_id){
        DB::table('blog_news')->where('news_id',$news_id)->delete();
        echo "xoa thanh cong";
        Session::flash('success','xoa bai viet viết thành công');
        return redirect()->back(); 
    }

}
