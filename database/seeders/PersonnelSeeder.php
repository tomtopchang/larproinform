<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnel')->insert([
            [
                'pno' => 'pe001',
                'cname' => '人事職員',
                'idno' => 'A123456789',
                'depname' => '人事室',
                'jobname' => '職員',
            ],
            [
                'pno' => 'bu001',
                'cname' => '業務一組長',
                'idno' => 'B123456789',
                'depname' => '業務一組',
                'jobname' => '組長',
            ],
            [
                'pno' => 'bu002',
                'cname' => '業務一組員',
                'idno' => 'C223456789',
                'depname' => '業務一組',
                'jobname' => '組員',
            ],
            [
                'pno' => 'bu123',
                'cname' => '業務二組長',
                'idno' => 'D123456789',
                'depname' => '業務二組',
                'jobname' => '組長',
            ],
            [
                'pno' => 'bu456',
                'cname' => '業務二組員',
                'idno' => 'E223456789',
                'depname' => '業務二組',
                'jobname' => '組員',
            ]            
        ]);
    }
}
