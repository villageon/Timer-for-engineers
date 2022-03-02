<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('profiles')->insert(
            [
                [
                    'user_id' => '1',
                    'contents' => 'ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介',
                ],
                [
                    'user_id' => '2',
                    'contents' => 'ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介',
                ],
                [
                    'user_id' => '3',
                    'contents' => 'ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介',
                ],
            ],
        );
    }
}
