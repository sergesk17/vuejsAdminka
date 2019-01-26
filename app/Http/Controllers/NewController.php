<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;

class NewController extends Controller
{
    public function users(Request $request)
    {
        $users = User::with('role','user_role')->get() ;
        return response([
            'status' => 'success',
            'data' => $users
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $user_role = UserRole::where('user_id',$id)->first();
        $user_role->role_id = $request->role;
        $user_role->save();
        return response([
            'status' => 'success',
            'users' => User::with('role','user_role')->get()
        ]);
    }
    public function blocked(Request $request)
    {
        $id = $request->id;
        $blocked = UserRole::where('user_id',$id)->first();
        $blocked->blocked = $request->blocked;
        $blocked->save();
        return response([
            'status' => 'success',
            'users' => User::with('role','user_role')->get()
        ]);
    }

}
