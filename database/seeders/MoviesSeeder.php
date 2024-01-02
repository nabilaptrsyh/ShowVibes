<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'nama' => 'Inception',
                'genre' => 'Science Fiction',
                'rating' => 9,
            ],
            [
                'nama' => 'The Shawshank Redemption',
                'genre' => 'Drama',
                'rating' => 9,
            ],
            [
                'nama' => 'The Dark Knight',
                'genre' => 'Action',
                'rating' => 9,
            ],
            [
                'nama' => 'Pulp Fiction',
                'genre' => 'Crime',
                'rating' => 8,
            ],
            [
                'nama' => 'Forrest Gump',
                'genre' => 'Drama',
                'rating' => 8,
            ],
            [
                'nama' => 'The Matrix',
                'genre' => 'Action',
                'rating' => 8,
            ],
            [
                'nama' => 'Titanic',
                'genre' => 'Romance',
                'rating' => 7,
            ],
            [
                'nama' => 'Avatar',
                'genre' => 'Action',
                'rating' => 7,
            ],
            [
                'nama' => 'The Godfather',
                'genre' => 'Crime',
                'rating' => 9,
            ],
            [
                'nama' => 'Jurassic Park',
                'genre' => 'Adventure',
                'rating' => 8,
            ],
        ];

        foreach ($movies as $movie) {
            Movies::create([
                'nama' => $movie['nama'],
                'genre' => $movie['genre'],
                'rating' => $movie['rating'],
            ]);
        }
    }
}
