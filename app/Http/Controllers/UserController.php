<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
     public function addUser(Request $request)
    {
         
        try
        {
            $user = new User();
            $user->type = $request->type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password= $request->password;
            
            if($user->save())
            {
                return response()->json(["status" => "success", "response" => $user]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "User wasn't saved"]);
        }

    }
    
    public function getAllUsers()
    {
        return response()->json(User::all());
    }
    
    public function getUserById($id)
    {
        return response()->json(User::findOrFail($id));
    }
    
    public function deleteUser($id)
    {
        
        try
        {
            User::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "User deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find user with this id"]);
        }
    }
}
