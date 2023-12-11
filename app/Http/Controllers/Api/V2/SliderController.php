<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\SliderCollection;
use Cache;

class SliderController extends Controller
{
    public function sliders()
    {
        return new SliderCollection(get_setting('home_slider_images') != null ? json_decode(get_setting('home_slider_images'), true) : []);
    }

    public function bannerOne()
    {
        return new SliderCollection(get_setting('home_banner1_images') != null ? json_decode(get_setting('home_banner1_images'), true) : []);
    }

    public function bannerTwo()
    {
        return new SliderCollection(get_setting('home_banner2_images') != null ? json_decode(get_setting('home_banner2_images'), true) : []);
    }

    public function bannerThree()
    {
        return new SliderCollection(get_setting('home_banner3_images') != null ? json_decode(get_setting('home_banner3_images'), true) : []);
    }
}
