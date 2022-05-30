<?php

namespace Database\Seeders;

use App\Models\User;
use CreateUsersTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeder User
        $this->call(UserSeeder::class);
        User::factory(10)->create();

        //seeder Kegiatan
        $this->call(KegiatanSeeder::class);

         //seeder Kegiatan
         $this->call(KegiatanSeeder::class);
    }
}
