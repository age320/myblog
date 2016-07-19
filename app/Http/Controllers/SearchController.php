<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Article;

class SearchController extends Controller
{
    public function getKeyword(Request $request)
    {
        $keyword = $request->input('keyword');
        if (empty($keyword)) {
            return redirect()->route('article.index');
        }
        $model = Article::where('title', 'like', "%$keyword%")->orderBy('id', 'desc')->simplePaginate(5);
        $navList = \App\Model\Category::get();
        $articleList = array('data' => [],);
        if(!empty($model)){
            foreach ($model as $key => $article) {
                $articleList['data'][$key] = Article::find($article->id);
            }
        }
        $articleList['page'] = $model;

        return \View::make('themes.default.search',compact('keyword','articleList','navList'));
        
    }
}
