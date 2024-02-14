<?php 
namespace App\Http\Service\Authentication;

use App\Helpers\ApiResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService{
    public function login(LoginRequest $request) 
    { 
        if(Auth::attempt(['email' =>$request->email , 'password' =>$request->password] ))
        { 
           $user = Auth::user() ; 
           $data['token'] = $user->createToken('ApiCourse')->plainTextToken ; 
           $data['name'] = $user->name ; 
           $data['email' ] = $user->email; 
           return $data ;
       }else { 

       }
    }
}