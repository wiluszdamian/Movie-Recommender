<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getTrending(string $type, string $validTime): Collection
    {
        if (session()->has("$type$validTime")) {
            return session()->get("$type$validTime");
        }

        $url = "$this->baseUri/trending/$type/$validTime?api_key=$this->apiKey";

        $response = Http::get($url);

        $results = collect($response->json()['results'])->map(function ($result) {
            $type = $result['media_type'];
            $id = $result['id'];
            $details = $this->getMediaDetails($type, $id);
            $genres = $this->getGenres($type);

            return [
                'id' => $details['id'],
                'title' => $details['title'] ?? $details['name'],
                'description' => $details['overview'],
                'vote_average' => $details['vote_average'],
                'vote_count' => $details['vote_count'],
                'genre' => $genres->firstWhere('id', $result['genre_ids'][0])['name'],
                'poster' => $result['poster_path'],
            ];
        });
        session(['$type$validTime' => $results]);

        return $results;
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
     * Retrieve popular actors.
     *
     * @return array The array of popular actors.
     */
    public function getActors(): array
    {
        $url = "$this->baseUri/person/popular?api_key=$this->apiKey";

        $response = Http::get($url);

        return $response->json()['results'];
    }
}
