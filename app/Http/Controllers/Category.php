<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Category extends Controller
{
    public function selectCategory(){
    	return DB::table('blog_category')->get()->toArray();
    }

    public function getListCategoryChild($listCategory, $parentId){
    	foreach ($listCategory as $cate){
    		if($cate->cat_parentId == $parentId){
    			echo $cate->cat_name.' ';
    		}
    	}
    }

    public function getCategoryParent($listCategory,$parent,$str=''){
    	foreach ($listCategory as $item) {
    		if($item->cat_parentId == $parent){
    			echo '<option value="'.$item->cat_id.'">'.$str.$item->cat_name.'</option>';
    			$this->getCategoryParent($listCategory,$item->cat_id,$str.'--');
    		}
    		
    	}

    }
    public function menuCategory(){
    	$listCategory = DB::table('blog_category')->get()->toArray();
    	$parent = 0;
    	#echo "<select>";
    	$this::getCategoryParent($listCategory, $parent, $str='');
    	#echo "</select>";
    }
}
