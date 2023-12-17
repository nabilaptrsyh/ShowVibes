<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewMoviesTest extends TestCase
{
    public function the_main_page_shows_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(), 
            'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(), 
            'https://api.themoviedb.org/3/genre/movie/list' => $this->fakeGenres(), 
        ]);

        $response = $this->get(route('movies.index'));
        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Freelance');
        $response->assertSee('Action, Comedy');
        $response->assertSee('Now Playing');
        $response->assertSee('Now Playing Freelance');
    }

    public function the_movie_page_shows_the_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
        ]);

        $response = $this->get(route('movies.show', 12345));
        $response->assertSee('Fake Jumanji');
        $response->assertSee('Jeanne McCarthy');
        $response->assertSee('Casting Director');
        $response->assertSee('Dwayne Johnson');
    }

    public function the_search_movie_dropdown_works_correctly()
    {
      Http::fake([
        'https://api.themoviedb.org/3/search/movie?query=jumanji' => $this->fakeSearchMovie(),
    ]);

    Livewire::test('search-movie-dropdown')
    ->assertDontSee('jumanji')
    ->set('search', 'jumanji')
    ->assertSee('Jumanji');
    }

    private function fakeSearchMovies()
    {
        return Http::response([
                'results' => [
                    [
                        "popularity" => 406.677,
                        "vote_count" => 2607,
                        "video" => false,
                        "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                        "id" => 419704,
                        "adult" => false,
                        "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                        "original_language" => "en",
                        "original_title" => "Jumanji",
                        "genre_ids" => [
                            12,
                            18,
                            9648,
                            878,
                            53,
                        ],
                        "title" => "Jumanji",
                        "vote_average" => 6,
                        "overview" => "Jumanji description. The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on planet earth.",
                        "release_date" => "2019-09-17",
                    ]
                ]
            ], 200);
    }

    private function fakePopularMovies()
    {
        return Http::response([
                'results' => [
                [
                "adult" => false,
                "backdrop_path" => "/zIYROrkHJPYB3VTiW1L9QVgaQO.jpg",
                "genre_ids" => [
                0 => 28,
                1 => 35,
                ],
                "id" => 897087,
                "original_language" => "en",
                "original_title" => "Freelance",
                "overview" => "An ex-special forces operative takes a job to provide security for a journalist as she interviews a dictator, but a military coup breaks out in the middle of the interview, they are forced to escape into the jungle where they must survive.",
                "popularity" => 1834.492,
                "poster_path" => "/zDb5YeHSGGMlS6eqhUXcVU2OzAJ.jpg",
                "release_date" => "2023-10-05",
                "title" => "Freelance",
                "video" => false,
                "vote_average" => 6.3,
                "vote_count" => 217,
                ]
                ]
            ], 200);
    }

    private function fakeNowPlayingMovies()
    {
        return Http::response([
        'results' => [
            [
                "adult" => false,
                "backdrop_path" => "/zIYROrkHJPYB3VTiW1L9QVgaQO.jpg",
                "genre_ids" => [
                  0 => 28,
                  1 => 35,
                ],
                "id" => 897087,
                "original_language" => "en",
                "original_title" => "Now Playing Freelance",
                "overview" => "An ex-special forces operative takes a job to provide security for a journalist as she interviews a dictator, but a military coup breaks out in the middle of the interview, they are forced to escape into the jungle where they must survive.",
                "popularity" => 1834.492,
                "poster_path" => "/zDb5YeHSGGMlS6eqhUXcVU2OzAJ.jpg",
                "release_date" => "2023-10-05",
                "title" => "Now Playing Freelance",
                "video" => false,
                "vote_average" => 6.3,
                "vote_count" => 217,
            ]
            ]
        ], 200);
    }

    private function fakeGenres()
    {
        return Http::response([
            'genres' => [
                [
                    "id" => 28,
                    "name" => "Action"
                  ],
                  [
                    "id" => 12,
                    "name" => "Adventure"
                  ],
                  [
                    "id" => 16,
                    "name" => "Animation"
                  ],
                  [
                    "id" => 35,
                    "name" => "Comedy"
                  ],
                  [
                    "id" => 80,
                    "name" => "Crime"
                  ],
                  [
                    "id" => 99,
                    "name" => "Documentary"
                  ],
                  [
                    "id" => 18,
                    "name" => "Drama"
                  ],
                  [
                    "id" => 10751,
                    "name" => "Family"
                  ],
                  [
                    "id" => 14,
                    "name" => "Fantasy"
                  ],
                  [
                    "id" => 36,
                    "name" => "History"
                  ],
                  [
                    "id" => 27,
                    "name" => "Horror"
                  ],
                  [
                    "id" => 10402,
                    "name" => "Music"
                  ],
                  [
                    "id" => 9648,
                    "name" => "Mystery"
                  ],
                  [
                    "id" => 10749,
                    "name" => "Romance"
                  ],
                  [
                    "id" => 878,
                    "name" => "Science Fiction"
                  ],
                  [
                    "id" => 10770,
                    "name" => "TV Movie"
                  ],
                  [
                    "id" => 53,
                    "name" => "Thriller"
                  ],
                  [
                    "id" => 10752,
                    "name" => "War"
                  ],
                  [
                    "id" => 37,
                    "name" => "Western"
                  ],
            ]
        ], 200);
    }


}