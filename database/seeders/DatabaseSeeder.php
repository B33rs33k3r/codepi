<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalog;
use App\Models\category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $catalog = Catalog::factory()
            ->count(2)
            ->create();

        $category = Category::factory()
            ->count(4)
            ->create();

        Product::factory()
            ->count(10)
            ->hasAttached($catalog)
            ->hasAttached($category)
            ->create();
    }
}
