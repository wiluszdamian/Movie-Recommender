<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\View\View;

class TvController extends Controller
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
        $details = $tmdbApiService->getMediaDetails('tv', (int) $id);
        $cast = $tmdbApiService->getActors('tv', $id)->take(6);
        $similar = $tmdbApiService->getSimilar('tv', $id)->take(6);

        return view('details.tv-detail', compact(
            'details',
            'cast',
            'similar'
        ));
    }
}
