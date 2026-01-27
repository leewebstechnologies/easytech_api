<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\GatewayController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/user/password/update', [ProfileController::class, 'PasswordUpdate'])->name('user.password.update');

});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
   Route::controller(SliderController::class)->group(function() {
    Route::get('/all/slider', 'AllSlider')->name('all.slider');
    Route::get('/add/slider', 'AddSlider')->name('add.slider');
    Route::post('/store/slider', 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
   });

   Route::controller(ServicesController::class)->group(function() {
    Route::get('/all/services', 'AllServices')->name('all.services');
    Route::get('/add/services', 'AddServices')->name('add.services');
    Route::post('/store/services', 'StoreServices')->name('store.services');
    Route::get('/edit/services/{id}', 'EditServices')->name('edit.services');
    Route::post('/update/services', 'UpdateServices')->name('update.services');
    Route::get('/delete/services/{id}', 'DeleteServices')->name('delete.services');
    Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
   });

    Route::controller(GatewayController::class)->group(function() {
        Route::get('/gateway/one', 'GateWayOne')->name('gateway.one');
        Route::post('/update/gateway/one', 'UpdateGateWayOne')->name('update.gateway.one');
        Route::get('/gateway/two', 'GateWayTwo')->name('gateway.two');
        Route::post('/update/gateway/two', 'UpdateGateWayTwo')->name('update.gateway.two');
   });

    Route::controller(TestimonialController::class)->group(function() {
        Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
        Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
   });

   Route::controller(BlogController::class)->group(function() {
    Route::get('/blog/category', 'BlogCategory')->name('blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
    Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
   });

    Route::controller(BlogController::class)->group(function() {
        Route::get('/all/blog/posts', 'AllBlogPosts')->name('all.blog.posts');
        Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');
   });

    Route::controller(SiteSettingController::class)->group(function() {
        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');
   });

    Route::controller(AboutController::class)->group(function() {
        Route::get('/about', 'About')->name('about');
        Route::post('/update/about', 'UpdateAbout')->name('update.about');
   });

});
