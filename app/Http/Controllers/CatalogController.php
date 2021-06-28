<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
class CatalogController extends Controller
{
    public function get_catalog()
    {
        $catalog = Catalog::get();

        return json_encode($catalog);
    }
}
