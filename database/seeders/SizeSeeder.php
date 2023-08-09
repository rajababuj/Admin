<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Size; 
class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->truncate();
        $sizes = [
            ['name' => 'Small'],
            ['name' => 'Medium'],
            ['name' => 'Large'],
            ['name' => 'XL'],
            ['name' => 'XXL'],
            ['name' => 'XXXL'],
           
        ];

        Size::insert($sizes);
    }

}
