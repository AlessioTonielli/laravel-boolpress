<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Politica', 'Scuole', 'Film', 'videogiochi', 'Serie Tv', ];

        foreach ($categories as $category){
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->save();
        }
    }
}
