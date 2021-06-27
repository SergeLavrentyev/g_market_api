<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticker;

class TickerController extends Controller
{
    public function get_tickers()
    {
        $tickers = Ticker::get();
        return json_encode($tickers);
    }
}
