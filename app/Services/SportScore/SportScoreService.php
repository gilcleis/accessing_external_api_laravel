<?php

namespace App\Services\SportScore;

use App\Services\SportScore\Endpoints\HasSports;
use App\Services\SportScore\Endpoints\HasTeams;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
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
            'X-Rapidapi-Key'  => config('services.sport_score.key'),
            'X-Rapidapi-Host' => config('services.sport_score.host'),
        ];
        $this->api = Http::withHeaders($headers)
        ->baseUrl(config('services.sport_score.baseUrl'));
    }

    public function refreshToken()
    {
        $token = Cache::get('sport_score_token');
        if (!$token) {
            $return = $this->api->get('refresh-token')->json();
            Cache::remember('sport_score_token', $return['expires_in'], fn () => $return['token']);

            $token = $return['token'];
        }

        $this->api->withToken($token);

        return $this->api;
    }
}
