<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [
            //main menu
            [
                'menu_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'category_id' => 1,
                'include_content' => true,
                'created_at' => Carbon::now()
            ],
            [
                'menu_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'category_id' => 2,
                'include_content' => true,
                'created_at' => Carbon::now()
            ],
            [
                'menu_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'category_id' => 3,
                'include_content' => true,
                'created_at' => Carbon::now()
            ],

            //side menu
            [
                'menu_id' => DB::table('menus')->where('name', '=', 'side')->value('id'),
                'category_id' => rand(4,7),
                'include_content' => false,
                'created_at' => Carbon::now()
            ],
            [
                'menu_id' => DB::table('menus')->where('name', '=', 'side')->value('id'),
                'category_id' => rand(8,10),
                'include_content' => false,
                'created_at' => Carbon::now()
            ],
        ];
    }
}
