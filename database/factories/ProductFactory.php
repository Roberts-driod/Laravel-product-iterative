<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Milk',
                'Bread',
                'Cheese',
                'Apple',
                'Chicken',
                'Rice',
                'Pasta',
                'Yogurt',
                'Juice',
                'Butter',
                'Eggs',
                'Tomatoes',
                'Potatoes',
                'Coffee',
                'Tea',
            ]),

            'quantity' => fake()->numberBetween(1, 100),

            'description' => fake()->sentence(),

            'expiration_date' => fake()->dateTimeBetween(
                'now',
                '+1 year'
            )->format('Y-m-d'),

            'status' => fake()->randomElement([
                'active',
                'inactive',
                'expired',
            ]),

            'price' => fake()->randomFloat(2, 0.50, 100),
        ];
    }
}
