<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticker_id',
        'acronim',
        'buy',
        'sell',
        'is_up'
    ];
}
