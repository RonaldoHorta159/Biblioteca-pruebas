<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\book;
use App\Models\category;
use App\Models\auther;
use App\Models\publisher;

class bookFactory extends Factory
{
    protected $model = book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'category_id' => category::factory(),
            'auther_id' => auther::factory(),
            'publisher_id' => publisher::factory(),
            'status' => 'Y'
        ];
    }
}
