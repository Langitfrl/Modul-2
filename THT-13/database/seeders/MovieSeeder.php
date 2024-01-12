<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_EN');
        for ($i = 0; $i < 10; $i++){
            Movie::create([
                'judul' => $faker -> sentence,
                'tahun' => $faker -> year,
                'sinopsis' => $faker -> sentence
            ]);
        }
    }
}
