<?php

namespace Database\Factories\products;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return  [
            'name'=>fake()->name(),
            'image_path'=>'assets/admin/images/gallery/'.rand(1,37).'.jpg',
            'quantity' => rand(1,100),
            'price'=>rand(100,500)
        ];
    }
}
