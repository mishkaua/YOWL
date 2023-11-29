<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $user->password = $request->password;
        $user->email_verified_at = $request->email_verified_at;
        $user->save();
        return response()->json(["message" => "User successfully created."], 201);
    }

    //show a particular user
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

    //update a user - add later
    public function updateUser($id) {
        
    }


    //destroy
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


}
