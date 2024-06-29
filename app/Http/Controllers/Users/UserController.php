<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Service\UserService;
use App\Http\Traits\Api\ApiResponse;
use App\Models\User;
use App\Http\Requests\Authentication\RegisterRequest;

class UserController extends Controller
{
    use ApiResponse;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService  = $userService;
    }

    public function store( RegisterRequest $registerRequest  ) 
    {
       $data = $this->userService->store($registerRequest) ;
        if($data) 
        {
            return $this->apiResponse($data , 'User Created Successfully' , 200) ;
        }
    }

    public function update(UserRequest $request,$id)
    {
        $record = $this->userService->update($request,$id);
        if ($record){
            return $this->apiResponseUpdated((new UserResource($record)));
        }
        return $this->apiResponse([] ,'not found ' , 403) ;
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete($user);
    return $this->apiResponseDeleted();
}
}





















 