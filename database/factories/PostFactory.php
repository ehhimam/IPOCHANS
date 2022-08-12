<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(2, 8)),
            'url'  => $this->faker->url(),
            'keterangan' => $this->faker->paragraph(mt_rand(5, 6)),
            'bukti'  => $this->faker->imageUrl(640, 480, 'animals', true),
            'status' => 'pending',
            'user_id' => mt_rand(1, 3),
            'category_id'   => mt_rand(1, 2)
        ];
    }
}
