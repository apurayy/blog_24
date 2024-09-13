<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list(){
        $data['getRecord'] = User::getRecordUser();
        $users = User::paginate(2);
        return view('admin.category.list', $data, compact('users'));
    }

    public function category_add(){
        return view('admin.category.cat_add');
    }
}
