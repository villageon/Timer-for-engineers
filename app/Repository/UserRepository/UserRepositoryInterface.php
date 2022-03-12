<?php

namespace App\Repository\UserRepository;

interface UserRepositoryInterface{
    
    public function getUser($userId);
    public function updateUserName($request, $user);
    public function getProfile($userId);
    public function createUpdateProfile($request, $profile);
    public function getImage($userId);
    public function createUpdateImage($image, $userId, $headerToStore, $iconToStore);
}