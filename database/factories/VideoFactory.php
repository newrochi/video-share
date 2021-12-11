<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;


class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persianFaker = FakerFactory::create('fa_IR');
        return [
            'name'=>$persianFaker->name(),
            'url'=>$persianFaker->imageUrl(640, 480, 'animals', true),
            'length'=>$persianFaker->randomNumber(2),
            'slug'=>$persianFaker->slug(),
            'description'=>$persianFaker->realText(),
            'thumbnail'=>'https://loremflickr.com/320/240/world?random='.rand(1,99)
        ];
    }
}
