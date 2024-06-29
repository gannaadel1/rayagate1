<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Controllers\Controller;

use App\Http\Service\Authentication\AuthenticationService;
use App\Http\Traits\Api\ApiResponse;

class AuthenticationController extends Controller
{
    use ApiResponse;

 protected $authenticationService;

    public function __construct( AuthenticationService $authenticationService)
    { 
        $this->authenticationService = $authenticationService ; 
    }
    

    public function login( LoginRequest $loginRequest , AuthenticationService $authenticationService) 
    {   
        $data = $this->authenticationService->login($loginRequest) ; 
         if($data) 
         { 
            return $this->apiResponse($data, 'User Logged In Successfully' , 200 ) ; 
         }
         return $this->apiResponse([], 'User Not Found' , 401 ) ; 
    }



}
