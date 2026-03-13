<?php

use App\Http\Controllers\Backend\GatewayController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Slider API
Route::get('/slider', [SliderController::class, 'ApiAllSliders']);

// Services API
Route::get('/services', [ServicesController::class, 'ApiAllServices']);
Route::get('services/{slug}', [ServicesController::class, 'getServicesBySlug']);

// Gateway One API
Route::get('/gatewayone', [GatewayController::class, 'ApiGatewayOne']);

// Gateway One API
Route::get('/gatewaytwo', [GatewayController::class, 'ApiGatewayTwo']);

// Testimonial API
Route::get('/testimonial', [TestimonialController::class, 'ApiAllTestimonials']);

// Blog Category API
Route::get('/blogcategory', [BlogController::class, 'ApiBlogCategory']);


// Blog Post API
Route::get('/allblogs', [BlogController::class, 'ApiAllBlogs']);
Route::get('/allblogs/{slug}', [BlogController::class, 'ApiAllBlogsSlug']);
Route::get('/category/{category_id}/blogs', [BlogController::class, 'getBlogsByCategory']);

// Site Setting API
Route::get('/sitesetting', [SiteSettingController::class, 'ApiSiteSetting']);


// About API
Route::get('/about', [AboutController::class, 'ApiAbout']);

// Contact API
Route::post('/contact', [ContactController::class, 'ApiContact']);
