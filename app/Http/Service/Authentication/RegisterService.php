<?php 
namespace App\Http\Service\Authentication;

use App\Models\User;
use App\Http\Requests\RegisterArticalRequest;

class RegisterService{
    public function register(RegisterArticalRequest $request){
        $data = $request->validated(); 
        $user = User::create($data); 
        $data['token'] = $user->createToken('ApiCourse')->plainTextToken;
        $data['name'] = $user->name ;
        $data['email'] = $user->email ;
        return $data;
    }
}