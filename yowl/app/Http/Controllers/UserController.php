<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //show users
    public function showUsers() {
        $users = User::all();
        return response()->json($users);
    }

    //add new user
    public function addUser(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = $request->email_verified_at;
        $user->save();
        return response()->json(["message" => "User successfully created."], 201);
    }

    public function showUser($id) {
        $user = User::find($id);
        if(!empty($user)) {
            return response()->json($user);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function updateUser(Request $request, $id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->is_admin = $request->is_admin ? $request->is_admin : $user->is_admin;
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;//need to make sure the new email doesn't already exist
            //$user->password = is_null($request->password) ? $request->password : Hash::make($request->password);
            $user->save();
                return response()->json([
                    "message" => "User data is updated."
                ], 200);
        } else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function deleteUser($id) {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function addAsAdmin(Request $request, $id){
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->is_admin = 1;
            $user->save();
            return response()->json([
                "message" => "User assigned as an admin."
            ], 200);
    } else {
        return response()->json([
            "message" => "User not found."
        ], 404);
        }
    }


}
