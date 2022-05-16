<?php

namespace Database\Factories;

use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'genre' => $this->faker->title,
            'description' => $this->faker->realText(),
            'coverImage' => $this->faker->imageUrl()
        ];
    }
}