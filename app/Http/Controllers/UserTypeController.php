<?php

namespace App\Http\Controllers;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function createUserType(request $request){

        #$user = new UserType();
        #$user->users_type = $request->users_type;
        #$user->save();

        $user = UserType::create([
            'users_type' => $request->users_type,
        ]);


        #return "Task Created Succcessfully";
        return response()->json(['Task Created Successfully']);      
    }
}
