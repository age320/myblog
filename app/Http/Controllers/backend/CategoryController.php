<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function getCategory(){
    	$navList = Category::get();
    }


    public function index(){
        $categorys = Category::get();
        return \View::make('backend.newcategory.list',compact('categorys'));
        //return 'welcome';
    }
    public function create(){
    	return \View::make('backend.newcategory.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
			'name' => 'required|unique:category|max:25',
		]);

    	$category = new Category;
    	$category->name = $request->get('name');

    	if($category->save()){
    		return redirect('backend/category');
    	}else{
    		return redirect()->back()->withInput()->withError('保存失败');
    	}
    }

    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        $navList = Category::get();
        return \View::make('backend/newcategory/edit',compact('category','navList'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name,'.$id.'|max:25',
        ]);
        $category = Category::find($id);
        $category->name = $request->get('name');
        if ($category->save()) {
            return redirect('backend/category');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
