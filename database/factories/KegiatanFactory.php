<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{

    protected $model = Kegiatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gambar' => $this->faker->title,
            'judul' => $this->faker->title,
            'deskripsi' => $this->faker->text
        ];
    }
}
