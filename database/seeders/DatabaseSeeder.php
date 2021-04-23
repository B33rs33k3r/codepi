<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogue;
use App\Models\Produits;
use App\Models\Categories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $catalogue = Catalogue::factory()
            ->count(2)
            ->create();

        $categories = Categories::factory()
            ->count(4)
            ->create();

        Produits::factory()
            ->count(10)
            ->hasAttached($catalogue)
            ->hasAttached($categories)
            ->create();
    }
}
