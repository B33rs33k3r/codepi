<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carac1' => $this->faker->shuffle('hello-world'),
            'carac2' => $this->faker->shuffle('hello-world'),
            'carac3' => $this->faker->randomNumber(3, FALSE)
        ];
    }
}
