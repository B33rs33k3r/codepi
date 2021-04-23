<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogue;
use App\Models\Produits;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogue::factory()
            ->count(2)
            ->has(Produits::factory()->count(10))
            ->create();
    }
}
