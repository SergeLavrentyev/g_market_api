<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'bitrix_id',
        'name',
        'code',
        'active',
        'preview_picture',
        'detail_picture',
        'sort',
        'catalog_id',
        'section_id',
        'description',
        'price',
        'currency_id',
    ];
}
