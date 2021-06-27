<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class getTicker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticker:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all current tickers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Ticker::truncate();
        $url = env('TICKER_URL');
        $response = Http::get($url);

        $tickers = json_decode($response->body());
        foreach($tickers as $item) {
            $ticker = new Ticker;
            $ticker->ticker_id = $item->id;
            $ticker->acronim = $item->acronim;
            $ticker->buy = $item->buy;
            $ticker->sell = $item->sell;
            $ticker->is_up = $item->isUp;
            $ticker->save();
        }
        print_r('tickers are addded');
    }
}
