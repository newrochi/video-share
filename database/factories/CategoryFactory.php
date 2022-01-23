<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //$persianFaker = FakerFactory::create('fa_IR');

        return [
            'name'=>$this->faker->name(),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->realText(),
            'icon'=>$this->faker->word(),
        ];
    }
}
