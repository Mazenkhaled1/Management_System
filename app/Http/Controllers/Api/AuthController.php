<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterArticalRequest;
use App\Http\Service\Authentication\LoginService;
use App\Http\Service\Authentication\RegisterService;


class AuthController extends Controller
{

      // protected $mazenService; // yshel el value $data
    protected $registerService;
    protected $loginService;
    public function __construct(RegisterService $registerService, LoginService $loginService)
    {
        $this->registerService = $registerService;
        $this->loginService    = $loginService;
    }

      // register 
    public function register(RegisterArticalRequest $request, RegisterService $registerService)
    {
        $data = $this->registerService->register($request);
        return $this->apiResponse($data, ' User Account Created Successfully', 200);
    }

      // login 

    public function login(LoginRequest $request)
    {
        $data = $this->loginService->login($request);
        if ($data) {
            return $this->apiResponse($data, 'User Logged In Successfully', 200);
        }
        return $this->apiResponse(401, 'User Not Found', []);
    }


      // logout 

    public function logout(Request $request) 
    { 
        $request->user()->currentAccessToken()->delete() ; 
        return $this->apiResponse($data ,  'User Logged Out Successfully' , 200) ;
    }
}
