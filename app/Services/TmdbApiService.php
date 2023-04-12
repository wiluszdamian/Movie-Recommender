<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class TmdbApiService
{
    protected string $baseUri;

    protected string $apiKey;

    public function __construct()
    {
        $this->baseUri = config('api.tmdb.base_uri');
        $this->apiKey = config('api.tmdb.api_key');
    }

    /**
     * Retrieve trending media based on type and valid time.
     *
     * @param  string  $type The type of media (e.g. movie, tv, person).
     * @param  string  $validTime The valid time for the trending media (e.g. day, week).
     * @return Collection The collection of trending media.
     */
    public function getTrending(string $type, string $validTime): Collection
    {
        $url = "$this->baseUri/trending/$type/$validTime?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['results'])->map(function ($result) {
            $type = $result['media_type'];
            $id = $result['id'];
            $details = $this->getMediaDetails($type, $id);
            $genres = $this->getGenres($type);

            return [
                'id' => $details['id'],
                'title' => $details['title'] ?? $details['name'],
                'release_date' => $details['release_date'] ?? $details['first_air_date'],
                'description' => $details['overview'],
                'vote_average' => $details['vote_average'],
                'vote_count' => $details['vote_count'],
                'genre' => $genres->firstWhere('id', $result['genre_ids'][0])['name'],
                'poster' => $result['poster_path'],
            ];
        });
    }

    /**
     * Retrieve media details based on type and ID.
     *
     * @param  string  $type The type of media (e.g. movie, tv, person).
     * @param  int  $id The ID of the media.
     * @return array The array of media details.
     */
    public function getMediaDetails(string $type, int $id): array
    {
        $url = "$this->baseUri/$type/$id?api_key=$this->apiKey";

        $response = Http::get($url);

        return $response->json();
    }

    /**
     * Retrieve upcoming media based on type.
     *
     * @param  string  $type The type of media (e.g. movie, tv).
     * @return Collection The collection of upcoming media.
     */
    public function getUpcoming(string $type): Collection
    {
        $url = "$this->baseUri/$type/upcoming?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['results']);
    }

    /**
     * Get top-rated movies or TV shows based on the given type.
     *
     * @param  string  $type The type of media (either 'movie' or 'tv') for which to get top-rated results.
     * @return Collection A collection of top-rated movies or TV shows with relevant details.
     */
    public function getTopRated(string $type): Collection
    {
        $url = "$this->baseUri/$type/top_rated?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['results'])->map(function ($result) use ($type) {
            $id = $result['id'];
            $details = $this->getMediaDetails($type, $id);
            $genres = $this->getGenres($type);

            return [
                'id' => $details['id'],
                'title' => $details['title'] ?? $details['name'],
                'vote_average' => $details['vote_average'],
                'release_date' => $details['release_date'] ?? $details['first_air_date'],
                'vote_count' => $details['vote_count'],
                'genre' => $genres->firstWhere('id', $result['genre_ids'][0])['name'],
                'poster_path' => $result['poster_path'],
            ];
        });
    }

    /**
     * Retrieve genres based on type.
     *
     * @param  string  $type The type of media (e.g. movie, tv).
     * @return Collection The collection of genres.
     */
    public function getGenres(string $type): Collection
    {
        $url = "$this->baseUri/genre/$type/list?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['genres']);
    }

    /**
     * Retrieve cast actors for films and series.
     *
     * @return Collection The array of popular actors.
     */
    public function getActors(string $type, string $id): Collection
    {
        $url = "$this->baseUri/$type/$id/credits?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['cast']);
    }

    public function getSimilar(string $type, string $id): Collection
    {
        $url = "$this->baseUri/$type/$id/similar?api_key=$this->apiKey";

        $response = Http::get($url);

        return collect($response->json()['results']);
    }
}
