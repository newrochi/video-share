<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $likable=$this->likable();
        return [
            'user_id'=>User::first()?? User::factory(),
            'likeable_type'=>$likable,
            'likeable_id'=>$likable::factory(),
            'vote'=>$this->faker->randomElement([1,-1])
        ];
    }

    public function likable(){
        return $this->faker->randomElement([
            Video::class,
            Comment::class
        ]);
    }
}
