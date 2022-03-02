<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimerHistorySeeder extends Seeder
{
    
    public function run()
    {
        DB::table('timer_histories')->insert(
            [
                [
                    'user_id' => '1',
                    'type' => '1',
                    'judge' => '1',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-02-20 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'type' => '2',
                    'judge' => '2',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-02-20 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'type' => '1',
                    'judge' => '2',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-03-01 12:12:12',
                ],
                [
                    'user_id' => '1',
                    'type' => '2',
                    'judge' => '1',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-03-02 12:12:12',
                ],
                [
                    'user_id' => '2',
                    'type' => '1',
                    'judge' => '2',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-03-01 12:12:12',
                ],
                [
                    'user_id' => '2',
                    'type' => '2',
                    'judge' => '1',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-03-02 12:12:12',
                ],
                [
                    'user_id' => '3',
                    'type' => '1',
                    'judge' => '1',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-01-20 12:12:12',
                ],
                [
                    'user_id' => '3',
                    'type' => '1',
                    'judge' => '2',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-01-20 12:12:12',
                ],
                [
                    'user_id' => '3',
                    'type' => '2',
                    'judge' => '1',
                    'comment' => 'ここにコメントここにコメントここにコメント',
                    'created_at' => '2022-01-20 12:12:12',
                ],
            ],
        );
    }
}
