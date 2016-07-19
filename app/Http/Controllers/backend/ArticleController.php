<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{
    //
    public function index(){
    	$articles = Article::get();
    	return \View::make('backend.newarticle.list',compact('articles'));
    	//return 'welcome';
    }

    public function create(){
        $navList = \App\Model\Category::get();
    	return \View::make('backend.newarticle.create',compact('navList'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    			'title' => 'required|unique:article|max:255',
    			'content' => 'required',
    		]);

    	$article = new Article;
    	$article->title = $request->get('title');
    	$article->content = $request->get('content');
        $category = \App\Model\Category::where('name',$request->get('category'))->first();
        $article->cate_id = $category->id;
    	$article->user_id = $request->user()->id;

    	if($article->save()){
    		return redirect('backend/article');
    	}else{
    		return redirect()->back()->withInput()->withError('保存失败');
    	}
    }
    public function edit($id)
    {
        $article = Article::where('id',$id)->first();
        $navList = \App\Model\Category::get();
        return \View::make('backend/newarticle/edit',compact('article','navList'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:article,title,'.$id.'|max:255',
            'content' => 'required', 
        ]);
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $category = \App\Model\Category::where('name',$request->get('category'))->first();
        $article->cate_id = $category->id;
        if ($article->save()) {
            return redirect('backend/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
