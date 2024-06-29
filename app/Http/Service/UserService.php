<?php

namespace App\Http\Service;


use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Requests\Authentication\RegisterRequest;

class UserService
{
    public function store(RegisterRequest $registerRequest) 
      
    {
         $data = $registerRequest->validated() ; 
         $new_user = User::create($data) ; 
         $data['token']= $new_user->createToken('ApiToken')->plainTextToken ;
         $data['name']= $new_user->name ;
         $data['email']= $new_user->email ;
         return $data ; 
    }

public function update(UserRequest $request,$id)
{
    $user = User::findOrFail($id);
    $data = $request->validated();
    $user->update($data);
    return $user;
}
}
