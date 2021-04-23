<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produits;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produits::factory()
            ->count(10)
            ->create();
    }
}
