<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        //$persianFaker = FakerFactory::create('fa_IR');
        return [
            'name'=>$this->faker->name(),
            'url'=>'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4',
            'length'=>$this->faker->randomNumber(2),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->realText(),
            'thumbnail'=>'https://loremflickr.com/320/240/world?random='.rand(1,99),
            'category_id'=>Category::first()??Category::factory(),
            'user_id'=>User::first()??User::factory()
        ];
    }
}
