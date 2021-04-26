<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $catalogue = Catalog::factory()
            ->count(2)
            ->create();

        $categories = Category::factory()
            ->count(4)
            ->create();

        Product::factory()
            ->count(10)
            ->hasAttached($catalogue)
            ->hasAttached($categories)
            ->create();
    }
}
