<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthUserResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\UserServices\UserService;

class UserController extends Controller
{
    use ApiResponse;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Edit User Profile 
    public function profileUpdate(Request $request)
    {
        $this->userService->update($request, auth()->id());
        $user = $this->userService->getUser();   
        return $this->success(trans('Your profile update successfully'), ['user' => new AuthUserResource($user)]);
    }

    // Update User Profile Image 
    public function updateProfilePicture(Request $request)
    {
        $this->userService->updateProfilePicture($request, auth()->id());
        $user = $this->userService->getUser();       
        return $this->success(trans('Your profile picture updated'),  ['user' => new AuthUserResource($user)]);
    }
}
