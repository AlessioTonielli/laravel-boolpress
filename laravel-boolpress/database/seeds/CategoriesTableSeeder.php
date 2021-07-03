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
        Category::truncate();
        $categories = ['politica', 'istruzione', 'film', 'videogiochi', 'serie tv', 'sport', 'motori', 'hobby', 'cibo'];

        foreach ($categories as $category){
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->save();
        }
    }
}
