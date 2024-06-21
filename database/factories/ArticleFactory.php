<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $authorIds = User::pluck('id')->all();
        $categoryIds = Category::pluck('id')->all();

        return [
            'name' => $this->faker->sentence,
            'body' => $this->faker->sentence,
            'author_id' => $this->faker->randomElement($authorIds),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
