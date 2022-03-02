<?php

namespace App\Constants;

class Common{
    const FIFTEEN = '1';
    const THIRTY = '2';

    const MINUTES = [
        'fifteen' => self::FIFTEEN,
        'thirty' => self::THIRTY,
    ];

    const WINNER = '1';
    const LOSER = '2';

    const JUDGE = [
        'winner' => self::WINNER,
        'loser' => self::LOSER,
    ];

}