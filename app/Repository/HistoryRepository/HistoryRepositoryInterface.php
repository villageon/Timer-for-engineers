<?php

namespace App\Repository\HistoryRepository;

interface HistoryRepositoryInterface{
    
    public function getComment($id, $userId);

    public function getYearFif($userId);
    public function getYearFifWin($userId);
    public function getMonthFif($userId);
    public function getMonthFifWin($userId);
    public function getDayFif($userId);
    public function getDayFifWin($userId);

    public function getYearThi($userId);
    public function getYearThiWin($userId);
    public function getMonthThi($userId);
    public function getMonthThiWin($userId);
    public function getDayThi($userId);
    public function getDayThiWin($userId);

    public function createHistory($userId, $request);

}