<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AdminController::class,"index"]);

    //Home Bannner Routes
    Route::get('home_banner',[HomeController::class,'home_banner'])->name('home_banner');
    Route::post('update_home_banner',[HomeController::class,'update_home_banner'])->name('update_home_banner');
    Route::post('delete_home_banner_images',[HomeController::class,'delete_home_banner_images']);

    //Home Technologies Routes
    Route::get('home_technologies',[HomeController::class,'home_technologies'])->name('home_technologies');
    Route::post('update_home_technologies',[HomeController::class,'update_home_technologies'])->name('update_home_technologies');

    //Home content Routes
    Route::get('home_content',[HomeController::class,'home_content'])->name('home_content');
    Route::post('update_home_content_one',[HomeController::class,'update_home_content_one'])->name('update_home_content_one');

    //Home content Seconds Routes
    Route::get('home_content_second',[HomeController::class,'home_content_second'])->name('home_content_second');
    Route::post('update_home_content_second',[HomeController::class,'update_home_content_second'])->name('update_home_content_second');

    //Home content third Routes
    Route::get('home_content_third',[HomeController::class,'home_content_third'])->name('home_content_third');
    Route::post('update_home_content_third',[HomeController::class,'update_home_content_third'])->name('update_home_content_third');

    //Home Our Services
    Route::get('home_our_service',[HomeController::class,'home_our_service'])->name('home_our_service');
    Route::post('create_service_for_home_page',[HomeController::class,'create_service_for_home_page'])->name('create_service_for_home_page');

    //Home loyal customers
    Route::get('loyal_customers',[HomeController::class,'loyal_customers'])->name('loyal_customers');
    Route::post('update_loyal_customers',[HomeController::class,'update_loyal_customers'])->name('update_loyal_customers');
    Route::post('delete_home_loyal_customers_images',[HomeController::class,'delete_home_loyal_customers_images'])->name('delete_home_loyal_customers_images');

    //Home content Fourth Routes
    Route::get('home_content_fourth',[HomeController::class,'home_content_fourth'])->name('home_content_fourth');
    Route::post('update_home_content_fourth',[HomeController::class,'update_home_content_fourth'])->name('update_home_content_fourth');

    //Home Testimonials Routes
    Route::get('home_testimonials',[HomeController::class,'home_testimonials'])->name('home_testimonials');
    Route::post('add_testimonials_to_db',[HomeController::class,'add_testimonials_to_db'])->name('add_testimonials_to_db');
    Route::get('delete_testimonials/{id}',[HomeController::class,'delete_testimonials'])->name('delete_testimonials');
    Route::post('update_testimonails',[HomeController::class,'update_testimonails'])->name('update_testimonails');

    //Services Categories Route
    Route::get('category',[ServicesController::class,'category'])->name('category');
    Route::post('create_category',[ServicesController::class,'create_category'])->name('create_category');
    Route::post('edit_category',[ServicesController::class,'edit_category'])->name('edit_category');
    Route::get('delete_category/{id}',[ServicesController::class,'delete_category'])->name('delete_category');

    //Services Sub Categories Route
    Route::get('sub_categories',[ServicesController::class,'sub_categories'])->name('sub_categories');
    Route::post('create_sub_category',[ServicesController::class,'create_sub_category'])->name('create_sub_category');
    Route::post('edit_sub_category',[ServicesController::class,'edit_sub_category'])->name('edit_sub_category');
    Route::get('delete_sub_category/{id}',[ServicesController::class,'delete_sub_category'])->name('delete_sub_category');

    //Services Sub Categories item Route
    Route::get('sub_categories_item',[ServicesController::class,'sub_categories_item'])->name('sub_categories_item');
    Route::post('create_sub_category_item',[ServicesController::class,'create_sub_category_item'])->name('create_sub_category_item');
    Route::post('edit_sub_category_work',[ServicesController::class,'edit_sub_category_work'])->name('edit_sub_category_work');
    Route::get('delete_work_image/{id}',[ServicesController::class,'delete_work_image'])->name('delete_work_image');
    Route::post('get_images_on_edit_work',[ServicesController::class,'get_images_on_edit_work'])->name('edit_sub_category');
    Route::get('delete_sub_category_item/{id}',[ServicesController::class,'delete_sub_category_item'])->name('delete_sub_category_item');

    //Services Details
    Route::get('service_details',[ServicesController::class,'service_details'])->name('service_details');
    Route::get('add_service_detail',[ServicesController::class,'add_service_detail'])->name('add_service_detail');
    Route::post('create_service_detail',[ServicesController::class,'create_service_detail'])->name('create_service_detail');
});


Route::get('/',[FrontController::class,"index"])->name('index');

Route::get('about_us',[FrontController::class,"about_us"])->name('about-us');

Route::get('service',[FrontController::class,"service"])->name('service');
Route::post('get_services_for_home',[FrontController::class,"get_services_for_home"])->name('get_services_for_home');
Route::post('get_work_on_home',[FrontController::class,"get_work_on_home"])->name('get_work_on_home');
Route::get('get_all_work_on_home',[FrontController::class,"get_all_work_on_home"])->name('get_all_work_on_home');

Route::get('blog_and_news',[FrontController::class,"blog_and_news"])->name('blog_and_news');

Route::get('blog_details',[FrontController::class,"blog_details"])->name('blog_details');

Route::get('contact',[FrontController::class,"contact"])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('contact_us',[FrontController::class,"contact_us"]);

