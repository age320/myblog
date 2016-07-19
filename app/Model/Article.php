<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';



    public static function getHomeArticle(){
    	$articles = Article::orderBy('created_at','desc')->get();
    	return $articles;
    }
}
