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
            'url'=>'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4',
            'length'=>$persianFaker->randomNumber(2),
            'slug'=>$persianFaker->slug(),
            'description'=>$persianFaker->realText(),
            'thumbnail'=>'https://loremflickr.com/320/240/world?random='.rand(1,99)
        ];
    }
}
