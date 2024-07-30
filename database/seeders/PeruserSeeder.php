<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeruserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peruser')->insert([
        [
            'account' => 'sysuser',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '管理員',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'unit' => 'all',
            'created_at' => now(),
        ],
        [
            'account' => 'per001',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '人事',
            'email' => 'per@gmail.com',
            'role' => '1',
            'unit' => '人事室',
            'created_at' => now(),
        ],
        [
            'account' => 'bus001',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務一組組長',
            'email' => 'bus001@gmail.com',
            'role' => '3',            
            'unit' => '業務一組',
            'created_at' => now(),
        ],
        [
            'account' => 'bus002',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務一組組員',
            'email' => 'bus002@gmail.com',
            'role' => '4',            
            'unit' => '業務一組',
            'created_at' => now(),
        ],
        [
            'account' => 'bus123',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務二組組長',
            'email' => 'bus123@gmail.com',
            'role' => '3',            
            'unit' => '業務二組',
            'created_at' => now(),
        ],
        [
            'account' => 'bus456',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務二組組員',
            'email' => 'bus456@gmail.com',
            'role' => '4',            
            'unit' => '業務二組',
            'created_at' => now(),
        ]
    ]);
    }
}
