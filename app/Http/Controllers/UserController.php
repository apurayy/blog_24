<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_list(){
        $data['getRecord'] = User::getRecordUser();
        $users = User::paginate(2);
        return view('admin.user.user_list', $data, compact('users'));
    }


    public function user_add(){
        return view('admin.user.add_user');
    }

    public function user_insert(Request $request){
        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->status = $request->status;
        $save->save();

        return redirect('user/list')->with('success', "User Add Successfull!");
    }

    public function user_edit($id){
        $data['getrecord'] = User::getSingle($id);
        return view('admin.user.edit', $data);
    }

    public function user_update($id, Request $request){

        $save = User::getSingle($id);

        $save->name = $request->name;
        $save->email = $request->email;

        if(!empty($request->password)){
            $save->password = Hash::make($request->password);
        }

        $save->status = $request->status;
        $save->save();

        return redirect('user/list')->with('success', "User Update Successfull!");
    }


    public function user_delete($id){

        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('user/list')->with('success', "User Delete Successfull!");
    }

}
