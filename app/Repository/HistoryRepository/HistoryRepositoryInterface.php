<?php

namespace App\Repository\HistoryRepository;

interface HistoryRepositoryInterface{
    
    public function getComment($id, $userId);
}