<?php

namespace App\Services\SportScore;

use App\Services\SportScore\Endpoints\HasSports;
use App\Services\SportScore\Endpoints\HasTeams;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * SportScore Rapid Api Service
 * https://rapidapi.com/tipsters/api/sportscore1
 */
class SportScoreService
{
    use HasSports, HasTeams;

    public PendingRequest $api;

    public function __construct()
    {
        $headers = [
            'X-RapidAPI-Key' => config('services.sport_score.key'),
            'X-RapidAPI-Host' => config('services.sport_score.baseUrl')
        ];
        $this->api = Http::withHeaders($headers)
        ->baseUrl('https://sportscore1.p.rapidapi.com');
    }
}
