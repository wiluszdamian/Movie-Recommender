<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage with trending and top-rated movies, TV shows, and actors.
     *
     * @param  TmdbApiService  $tmdbService An instance of the TmdbApiService class for making TMDB API requests.
     * @param  Request  $request An instance of the Request class for handling HTTP requests.
     * @return View The view for the homepage.
     */
    public function index(TmdbApiService $tmdbService, Request $request): View
    {
        $todayDate = now()->format('Y-m-d');

        $trendingGeneral = Cache::get('trendingGeneral');
        $trendingTvs = Cache::get('trendingTvs');
        $trendingMovies = Cache::get('trendingMovies');
        $topRatedMovies = Cache::get('topRatedMovies');
        $topRatedTvs = Cache::get('topRatedTvs');
        $upcomingMovies = Cache::get('upcomingMovies');

        if (! $trendingGeneral) {
            $trendingGeneral = $tmdbService->getTrending('all', 'day')->take(3);
            $trendingTvs = $tmdbService->getTrending('tv', 'week')->take(6);
            $trendingMovies = $tmdbService->getTrending('movie', 'week')->take(6);
            $topRatedMovies = $tmdbService->getTopRated('movie')->take(6);
            $topRatedTvs = $tmdbService->getTopRated('tv')->take(6);
            $upcomingMovies = $tmdbService->getUpcoming('movie')->take(6);
            Cache::put('trendingGeneral', $trendingGeneral, 600);
            Cache::put('trendingTvs', $trendingTvs, 600);
            Cache::put('trendingMovies', $trendingMovies, 600);
            Cache::put('topRatedMovies', $topRatedMovies, 600);
            Cache::put('topRatedTvs', $topRatedTvs, 600);
            Cache::put('upcomingMovies', $upcomingMovies, 600);
        }

        return view('welcome',
            compact(
                'trendingGeneral',
                'trendingMovies',
                'topRatedTvs',
                'topRatedMovies',
                'upcomingMovies',
                'trendingTvs',
                'todayDate'
            )
        );
    }
}
