<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;

class MovieController extends Controller
{
    public function show(TmdbApiService $tmdbApiService, string $id)
    {
        $details = $tmdbApiService->getMediaDetails('movie', (int) $id);

        return view('details.movie-detail', compact('details'));
    }
}
