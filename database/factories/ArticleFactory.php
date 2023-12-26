<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => function () {
                return Category::query()->inRandomOrder()->first()->id ?? CategoryFactory::new()->create()->id;
            },
            'title' => Str::title($this->faker->words(2, true)),
            'content' => Str::title($this->faker->words(5, true)),
            'is_published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
