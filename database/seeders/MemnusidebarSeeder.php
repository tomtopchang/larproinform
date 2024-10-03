<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemnusidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memnusidebar')->insert([
        [
            'name' => '首頁',
            'nav' => 0,
            'item' => '/dashboard',
            'icon' => 'fa fa-dashboard',
            'sort' => 0,
        ],
        [
            'name' => '後台管理',
            'nav' => 0,
            'item' => NULL,
            'icon' => 'fa fa-desktop',
            'sort' => 0,
        ],
        [
            'name' => '權限管理',
            'nav' => 2,
            'item' => '/backstage/role',
            'icon' => NULL,
            'sort' => 0,
        ],
        [
            'name' => '帳號管理',
            'nav' => 2,
            'item' => '/backstage/manager',
            'icon' => NULL,
            'sort' => 0,
        ],
        [
            'name' => '人員基本查詢',
            'nav' => 0,
            'item' => '/backstage/manager',
            'icon' => 'fa fa-user',
            'sort' => 0,
        ],
        [
            'name' => '差勤作業',
            'nav' => 0,
            'item' => NULL,
            'icon' => 'fa fa-fw fa-file',
            'sort' => 0,
        ],
        [
            'name' => '差勤審核',
            'nav' => 6,
            'item' => '/backstage/ｖacation_check',
            'icon' => NULL,
            'sort' => 0,
        ],
        [
            'name' => '請假作業',
            'nav' => 6,
            'item' => '/backstage/ｖcation',
            'icon' => NULL,
            'sort' => 0,
        ]
    ]);
    }
}
