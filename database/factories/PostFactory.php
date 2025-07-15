<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Writer;
use Illuminate\Support\Str;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id' => Str::uuid()->toString(),
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(2, true),
            'writer_id' => '76486526-4ce3-35be-8c2c-02f1fc0b06a2',
        ];
    }

    // configure(): This method is called when the factory is resolved.

    // afterCreating(): We register a callback here that Laravel will execute immediately after the Post record has been saved to the database and has an ID.

    // function (Post $post): The callback receives the instance of the Post that was just created.

    public function configure(): static
    {
        // The afterCreating method runs after a Post model has been created.
        return $this->afterCreating(function (Post $post) {
            
            // Access the 'categories' relationship on the newly created post
            // and attach the category with an ID of 1.
            // This will create a new record in your pivot table (e.g., 'category_post').
            $post->categories()->attach(4);

        });
    }
}
