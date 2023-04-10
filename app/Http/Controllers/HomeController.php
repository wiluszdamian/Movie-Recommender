<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class HomeController extends Controller
{
    /**
     * Display the application index page.
     *
     * @param  TmdbApiService  $tmdbService The TmdbApiService instance used to fetch data from the TMDb API.
     * @return View The index view with trending movies, trending TV shows, upcoming movies, popular actors, and the current date.
     *
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    public function index(TmdbApiService $tmdbService): View
    {
        $todayDate = now()->format('Y-m-d');

        $trendingGeneral = $tmdbService->getTrending('all', 'day');
        $trendingMovies = $tmdbService->getTrending('movie', 'week');
        $trendingTvs = $tmdbService->getTrending('tv', 'week');
        $upcomingMovies = $tmdbService->getUpcoming('movie');
        $actors = $tmdbService->getActors();

        return view('welcome', compact('trendingGeneral', 'trendingMovies', 'upcomingMovies', 'trendingTvs', 'actors', 'todayDate'));
    }
}
