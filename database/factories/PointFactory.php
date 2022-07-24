<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Here we put some fake data for Petitions Table
            'name'=>$this->faker->randomElement($array = array ('A','B','C','D','E','F','G','H')),
            'x'=>$this->faker->numberBetween(0,9),
            'y'=>$this->faker->numberBetween(0,9)
        ];
    }
}
