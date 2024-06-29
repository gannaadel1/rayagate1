<?php

namespace App\Http\Service\Authentication;
use App\Models\User;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Support\Facades\Auth;



class AuthenticationService
{
    


     public function login(LoginRequest $loginRequest) 
      
     {
          if(Auth::attempt( [ 'email' => $loginRequest->email , 'password' => $loginRequest->password]))
         {
            $user = Auth::user() ;
            $data['token']= $user->createToken('ApiToken')->plainTextToken ;
            $data['name']= $user->name ;
            $data['email']= $user->email ;
            return $data ;
         } 
          
     }

    
}