<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('categories')->truncate();

        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Home & Kitchen'],
            ['name' => 'Toys'],
            ['name' => 'Electrical'],
            ['name' => 'Cosmetics'],
            ['name' => 'Sports'],
            
        ];

        Category::insert($categories);
    }
}
