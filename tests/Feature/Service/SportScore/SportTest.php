<?php

namespace Tests\Feature\Service\SportScore;

use App\Services\SportScore\Entities\Sport;
use App\Services\SportScore\SportScoreService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        Http::fake([
            'https://sportscore1.p.rapidapi.com/*' => Http::response([
                'data' => [
                    [
                        'id'                => 1,
                        'name'              => 'Football',
                        'slug'              => 'football',
                        'name_translations' => [
                            'en' => 'Football',
                            'de' => 'Fußball',
                        ],
                    ],
    
                ],
            ]),
        ]);


        $service = new SportScoreService();
        $sport = $service->sports()->get();
        expect($sport)->toBeInstanceOf(Collection::class)
            ->and($sport->first())->toBeInstanceOf(Sport::class);
    }
}
