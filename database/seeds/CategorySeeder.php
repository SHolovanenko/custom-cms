<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $generator = new Generator();

        $numCategories = 10;
        for ($i = 0; $i < $numCategories; $i++) {
            $title = 'Category #'. $i;
            $parentId = 0;

            if ($i > 3) {
                $parentId = rand(1, ($i - 1));
                $title = 'Nested (in '. $parentId .') '. $title;
            }

            $alias = Str::of($title)->slug();
            $description = 'some description for '. $title;
            $createdAt = Carbon::now();

            $categories[] = [
                'parent_id' => $parentId,
                'alias' => $alias,
                'title' => $title,
                'description' => $description,
                'created_at' => $createdAt,
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
