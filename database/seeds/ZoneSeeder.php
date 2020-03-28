<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            [
                'name' => 'top',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'head',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'middle-top',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'middle-bottom',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'middle-left',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'middle-right',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'bottom',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('zones')->insert($zones);
    }
}
