<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
        [
            'created_at' => now(),
            'name' => '總權限',
            'role' => '0',
        ],
        [
            'created_at' => now(),
            'name' => '人事',
            'role' => '0',
        ] ,
        [
            'created_at' => now(),
            'name' => '單位主管',
            'role' => '1,5,6,7,8',
        ],
        [
            'created_at' => now(),
            'name' => '職員',
            'role' => '1,5,6,8',
        ]
    ]);
    }
}
