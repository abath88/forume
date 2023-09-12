<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraphs(),
            'user_id' => User::factory(),
            'commentable_type' => function (array $attributes) {
                return Post::find($attributes['votable_type'])->getMorphClass();
            },
            'commentable_id' => Post::factory()
        ];
    }

    public function forComment(): array
    {
        return [
            'body' => $this->faker->paragraphs(),
            'user_id' => User::factory(),
            'commentable_type' => function (array $attributes) {
                return Comment::find($attributes['votable_type'])->getMorphClass();
            },
            'commentable_id' => Comment::factory()
        ];
    }
}
