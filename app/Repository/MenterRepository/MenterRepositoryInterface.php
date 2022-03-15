<?php

namespace App\Repository\MenterRepository;

interface MenterRepositoryInterface{
    
    public function getMenter($userId);
    public function createUpdateMenter($userId, $request, $menter);
}