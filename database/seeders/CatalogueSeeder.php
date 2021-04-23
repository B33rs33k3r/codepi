<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogue;

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
            ->create();
    }
}
