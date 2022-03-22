<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('categories');

        foreach ($categories as $category) {

            $newCategory = new Category;

            $newCategory -> name = $category;

            $newCategory -> save();
        }
    }
}
