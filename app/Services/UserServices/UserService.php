<?php

namespace App\Services\UserServices;
use App\Repositories\UserRepositories\UserRepository;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Update user profile 
    public function update($request, $id)
    {  
        return $this->userRepository->update($request, $id);
    }

    // Get auth user data 
    public function getUser()
    {  
        return $this->userRepository->getUser();
    }

    // update Profile Picture 
    public function updateProfilePicture($request, $id)
    {
        $imagePath = $this->userRepository->storeImage($request);
        return $this->userRepository->updateProfilePicture($id, $imagePath);
    }
}
