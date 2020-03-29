<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'home',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'category',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'post',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('pages')->insert($pages);
    }
}
