<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'main',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'side',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('menus')->insert($menus);
    }
}
