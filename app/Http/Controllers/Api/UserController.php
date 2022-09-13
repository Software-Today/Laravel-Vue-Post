<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewUser()
    {
        try{
            $user = User::latest()->get();
            return sendSuccessResponse($user, "Data Retrieve Successfully", 200);
        }catch(QueryException $e){
            return sendErrorResponse("Database Connection Failed !", $e->getMessage(), 500);
        }
    }

    public function addUser(Request $request)
    {
        return "Add User";
    }

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        if($validator->fails()){
            return sendErrorResponse('Client Side Errors !!', $validator->errors(), 422);
        };

       // return $request->all();

       try{
            $data = $validator->validate();
            $user = User::create($data);
            return sendSuccessResponse($user, "User Registration Successfully !", 201);
       }catch(QueryException $e){
            return sendErrorResponse("Something Went Wrong !", $e->getMessage(), 500);
       }
    }
}
