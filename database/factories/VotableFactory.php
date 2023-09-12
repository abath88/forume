<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Votable>
 */
class VotableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'votable_id' => Post::factory(),
            'votable_type' => function(array $attributes) {
                return Post::find($attributes['votable_id'])->getMorphClass();
            },
            'vote' => $this->faker->boolean ? 1 : -1
        ];
    }

    public function forComment(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => User::factory(),
                'votable_id' => Comment::factory(),
                'votable_type' => function (array $attributes) {
                    return Comment::find($attributes['votable_type'])->getMorphClass();
                },
                'vote' => $this->faker->boolean ? 1 : -1
            ];
        });
    }
}
