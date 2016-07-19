<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Article;
use App\Model\Category;

class ArticleController extends Controller
{
    public function index(){
    	$articleList = Article::simplePaginate(5);
    	$navList = Category::get();
    	return \View::make('themes.default.index',compact('articleList','navList'));
    }

    public function show($id){
    	$article = Article::find($id);
    	$navList = Category::get();
    	return \View::make('themes.default.article',compact('article','navList'));
    }
}
