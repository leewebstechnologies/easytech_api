<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function AllSlider() {
        $slider = Slider::latest()->get();
        return view('backend.slider.all_slider', compact('slider'));
    }

    // End Method
}
