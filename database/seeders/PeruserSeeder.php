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
            'account' => 'pe001',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '人事',
            'email' => 'per@gmail.com',
            'role' => '1',
            'unit' => 'per',
            'created_at' => now(),
        ],
        [
            'account' => 'bu001',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務一組組長',
            'email' => 'bu001@gmail.com',
            'role' => '3',            
            'unit' => 'bus1',
            'created_at' => now(),
        ],
        [
            'account' => 'bu002',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務一組組員',
            'email' => 'bu002@gmail.com',
            'role' => '4',            
            'unit' => 'bus1',
            'created_at' => now(),
        ],
        [
            'account' => 'bu123',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務二組組長',
            'email' => 'bu123@gmail.com',
            'role' => '3',            
            'unit' => 'bus2',
            'created_at' => now(),
        ],
        [
            'account' => 'bu456',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '業務二組組員',
            'email' => 'bu456@gmail.com',
            'role' => '4',            
            'unit' => 'bus2',
            'created_at' => now(),
        ]
    ]);
    }
}
