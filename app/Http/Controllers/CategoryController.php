<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function category_list(){
        $data['catRecord'] = Category::getRecord();
            $cat = Category::paginate(2);
        return view('admin.category.list',$data, compact('cat'));
    }

    public function category_add(){
        return view('admin.category.cat_add');
    }


    public function category_insert(Request $request){
        $save = new Category();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->save();

        return redirect('category/list')->with('success', "Category Add Successfull!");
    }

}
