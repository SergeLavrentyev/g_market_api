<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
class CatalogController extends Controller
{
    public function get_catalog()
    {
        $catalog = Catalog::all();

        return json_encode($catalog);
    }
}
