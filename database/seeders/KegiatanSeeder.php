<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'gambar' => 'hanya text',
            'judul' => 'asdasdsad',
            'deskripsi' => 'asdsadasdasd',
        ];
        Kegiatan::insert($user);
    }
}
