<?php

namespace App\Console\Commands;

use App\Services\SportScore\Endpoints\HasSports;
use App\Services\SportScore\Entities\Sport;
use App\Services\SportScore\SportScoreService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Playground command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $service = new SportScoreService();

        $response = $service
            ->teams()
            ->fromSport(1)
            ->get();

        // foreach ($response as $dado ){
        //     echo $dado->name.PHP_EOL;
        // }
        dd($response);
        return Command::SUCCESS;
    }
}
