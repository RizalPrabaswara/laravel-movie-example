<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    protected $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge(
            [
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path'],
                'vote_average' => round($this->movie['vote_average'] * 10) . '%',
                'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
                'release_datey' => Carbon::parse($this->movie['release_date'])->format('Y'),
                'genres' => collect($this->movie['genres'])->pluck('name')->implode(', '),
                'crew' => collect($this->movie['credits']['crew'])->take(3),
                'cast' => collect($this->movie['credits']['cast'])->take(10),
                // 'cast_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movie['profile_path'],
                'images' => collect($this->movie['images']['backdrops'])->take(12),
            ]
        );
    }
}
