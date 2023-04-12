<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Show details of a specific media using its ID.
     *
     * @param  TmdbApiService  $tmdbApiService The TMDb API service instance.
     * @param  string  $id The ID of the media.
     * @return View The view displaying the details of the media.
     */
    public function show(TmdbApiService $tmdbApiService, string $id)
    {
        $details = $tmdbApiService->getMediaDetails('movie', (int) $id);
        $cast = $tmdbApiService->getActors('movie', $id)->take(6);
        $similar = $tmdbApiService->getSimilar('movie', $id)->take(6);

        return view('details.movie-detail', compact(
            'details',
            'cast',
            'similar'
        ));
    }
}
