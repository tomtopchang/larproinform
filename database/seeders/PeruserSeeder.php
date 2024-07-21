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
            'account' => 'sysuser',
            'password' => Hash::make('!QAZ2wsx'),
            'name' => '管理員',
            'email' => 'admin@gmail.com',
            'created_at' => now(),
        ]);
    }
}
