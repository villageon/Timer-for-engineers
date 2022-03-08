<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenterSeeder extends Seeder
{
    
    public function run()
    {
       DB::table('menters')->insert(
            [
                [
                    'user_id' => '1',
                    'm_name' => 'menter1',
                    'm_email' => 'meter@test.com',
                ],
                [
                    'user_id' => '2',
                    'm_name' => 'menter2',
                    'm_email' => 'meter2@test.com',
                ],
                [
                    'user_id' => '3',
                    'm_name' => 'menter3',
                    'm_email' => 'meter3@test.com',
                ],
                [
                    'user_id' => '4',
                    'm_name' => 'menter4',
                    'm_email' => 'meter4@test.com',
                ],
                [
                    'user_id' => '5',
                    'm_name' => 'menter5',
                    'm_email' => 'meter5@test.com',
                ],
            ],
        );
    }
}
