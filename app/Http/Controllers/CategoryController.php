<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Article;

class CategoryController extends Controller
{
    public function show($id){
    	$articleList = Article::where('cate_id',$id)->get();
    	$category = \App\Model\Category::find($id);
    	$navList = \App\Model\Category::get();
    	return \View::make('themes.default.category',compact('articleList','navList','category'));
    }
}
