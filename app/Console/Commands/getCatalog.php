<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Catalog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class GetProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch catalog from bitrix and store it to local db';

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
        print_r('clear db');
        Catalog::truncate();
        $url = env('CATALOG_URL');
        $response = Http::get($url);
        print_r('send request to bitrix');
        $btx_catalog = json_decode($response->body(), true);
        print_r('storing data to db');

        $catalog = new Catalog;

        foreach($btx_catalog['result'] as $item) {
            $catalog['bitrix_id'] = $item["ID"];
            $catalog['name'] = $item['NAME'];
            $catalog['code'] = $item['CODE'];
            $catalog['active'] = $item['ACTIVE'];
            $catalog['preview_picture'] = $item['PREVIEW_PICTURE'];
            $catalog['detail_picture'] = $item['DETAIL_PICTURE'];
            $catalog['sort'] = $item['SORT'];
            $catalog['catalog_id'] = $item['CATALOG_ID'];
            $catalog['section_id'] = $item['SECTION_ID'];
            $catalog['description'] = $item['DESCRIPTION'];
            $catalog['price'] = $item['PRICE'];
            $catalog['currency_id'] = $item['CURRENCY_ID'];
            $catalog->save();
        }

        print_r('catalog loaded');

        // Product::truncate();
        // $url = env('PRODUCT_URL');
        // $response = Http::get($url);
    }
}
