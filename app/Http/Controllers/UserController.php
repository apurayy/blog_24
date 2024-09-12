<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list(){
        $data['getRecord'] = User::getRecordUser();
        $users = User::paginate(2);
        return view('admin.user.user_list', $data, compact('users'));
    }
}
