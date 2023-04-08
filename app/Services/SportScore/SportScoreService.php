<?php

namespace App\Services\SportScore;

use App\Services\SportScore\Endpoints\HasSports;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * SportScore Rapid Api Service
 * https://rapidapi.com/tipsters/api/sportscore1
 */
class SportScoreService
{
    use HasSports;

    public PendingRequest $api;

    public function __construct()
    {
        $headers = [
            'X-RapidAPI-Key' => 'fec0a80510msh243e842907fc71ap1f0ef3jsn32f184f6f2c1',
            'X-RapidAPI-Host' => 'sportscore1.p.rapidapi.com'
        ];
        $this->api = Http::withHeaders($headers)
        ->baseUrl('https://sportscore1.p.rapidapi.com');
    }
}
