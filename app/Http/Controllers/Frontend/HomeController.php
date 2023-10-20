<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    const ACTIVE_SLIDER_STATUS = 1;

    public function index()
    {
        $sliders = Cache::rememberForever('sliders', function () {
            return Slider::where('status', self::ACTIVE_SLIDER_STATUS)->orderBy('serial', 'asc')->get();
        });

        $flashSaleDate = FlashSale::first();

        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->pluck('product_id')->toArray();

        return view('frontend.home.home', compact(
                'sliders',
                'flashSaleDate',
                'flashSaleItems',
            )
        );
    }
}
