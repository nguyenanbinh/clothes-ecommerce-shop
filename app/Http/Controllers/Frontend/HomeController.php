<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const ACTIVE_SLIDER_STATUS = 1;
    public function index () {
        $sliders = Slider::where('status', self::ACTIVE_SLIDER_STATUS)->orderBy('serial')->get();

        return view('frontend.home.home', compact('sliders'));
    }
}
