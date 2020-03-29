<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [
            //home page
            [
                'page_id' => DB::table('pages')->where('name', '=', 'home')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'top')->value('id'),
                'content_type' => 'menu',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],
            [
                'page_id' => DB::table('pages')->where('name', '=', 'home')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'middle-top')->value('id'),
                'content_type' => 'list-posts',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],

            //category_news page
            [
                'page_id' => DB::table('pages')->where('name', '=', 'category')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'top')->value('id'),
                'content_type' => 'list-categories',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],
            [
                'page_id' => DB::table('pages')->where('name', '=', 'category')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'middle-top')->value('id'),
                'content_type' => 'list_posts',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],
            [
                'page_id' => DB::table('pages')->where('name', '=', 'category')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'middle-left')->value('id'),
                'content_type' => 'menu',
                'content_id' => DB::table('menus')->where('name', '=', 'side')->value('id'),
                'created_at' => Carbon::now()
            ],

            //post page
            [
                'page_id' => DB::table('pages')->where('name', '=', 'post')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'top')->value('id'),
                'content_type' => 'menu',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],
            [
                'page_id' => DB::table('pages')->where('name', '=', 'post')->value('id'),
                'zone_id' =>  DB::table('zones')->where('name', '=', 'middle-top')->value('id'),
                'content_type' => 'post',
                'content_id' => DB::table('menus')->where('name', '=', 'main')->value('id'),
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('page_zones')->insert($relations);
    }
}
