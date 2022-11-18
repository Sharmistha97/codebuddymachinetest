<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryLevel;

class HomeController extends Controller
{
     /**
     * HomeController list method.
     *
     */
    public function index(Request $req)
    {
        $category = Category::with(['categoryLevels' => function ($query) {
            $query->select('category_levels.*');
        }])->get();
       // dd($category);
        return view('admin.pages.home',compact('category'));
    }
    /**
     * HomeController create method show  category form blade.
     *
     */
    public function create(Request $req)
    {
        return view('admin.pages.index');
    }
    /**
     * HomeController store method create  category.
     *
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'catname' => 'required',
            'catlevel' => 'required'
        ]);
        $cat=[];
        $catSub=[];
        $cat['name'] = $request->catname;
        $createCat=Category::create($cat);
        if($createCat){
            $catSub['level']=$request->catlevel;
            $catSub['category_id']=$createCat->id;
            $createCat=CategoryLevel::create($catSub);
        }  
        return redirect(route('admin.home'))
        ->withSuccess('cat data has been saved successfully');
    }
    /**
     * HomeController edit method edit  category.
     *
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $categorySub = CategoryLevel::where('category_id', $id)->first();
        return view('admin.pages.edit',compact('category','categorySub'));
    }
     /**
     * HomeController update method update  category.
     *
     */
    public function update(Request $request,$id)
    {
        // validation
        $this->validate($request, [
            'catname' => 'required',
            'catlevel' => 'required'
        ]);
        $cat=[];
        $catSub=[];
        $cat['name'] = $request->catname;
        $upCat=Category::where('id', $id)->update($cat);
        if($upCat){
            $catSub['level']=$request->catlevel;
            $catSub['category_id']=$id;
            $createCat=CategoryLevel::where('category_id',$id)->update($catSub);
        }  
        return redirect(route('admin.home'))
        ->withSuccess('cat data has been update successfully');
    }
     /**
     * HomeController delete method delete  category.
     *
     */
    public function delete($id)
    {
        $category = Category::where('id',$id)->delete();
        return redirect(route('admin.home'))
        ->withSuccess('cat data has been delete successfully');
    }
}