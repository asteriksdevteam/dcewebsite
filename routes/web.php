<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogController;

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

Route::get('/clear', function() {
    try {
        // Clear various caches
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return 'Application caches cleared successfully.';
    } catch (\Exception $e) {
        return 'Cache clearing failed: ' . $e->getMessage();
    }
});


Route::get('demo',function()
{
    return view('welcome');
});

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
    Route::get('edit_service_detail/{id}',[ServicesController::class,'edit_service_detail'])->name('edit_service_detail');
    Route::post('update_service_details',[ServicesController::class,'update_service_details'])->name('update_service_details');
    Route::get('delete_service_detail/{id}',[ServicesController::class,'delete_service_detail'])->name('delete_service_detail');

    //About Us Section 
    Route::get('all_about_us_banner',[AboutUsController::class,'all_about_us_banner'])->name('all_about_us_banner');
    Route::post('update_about_banner',[AboutUsController::class,'update_about_banner'])->name('update_about_banner');
    Route::get('who_we_are',[AboutUsController::class,'who_we_are'])->name('who_we_are');
    Route::post('update_who_we_are',[AboutUsController::class,'update_who_we_are'])->name('update_who_we_are');
    Route::get('mission_vision',[AboutUsController::class,'mission_vision'])->name('mission_vision');
    Route::post('update_mission_vision',[AboutUsController::class,'update_mission_vision'])->name('update_mission_vision');

    Route::get('our_Philosophy',[AboutUsController::class,'our_Philosophy'])->name('our_Philosophy');
    Route::post('update_our_philosophy',[AboutUsController::class,'update_our_philosophy'])->name('update_our_philosophy');

    Route::get('asked_question',[AboutUsController::class,'asked_question'])->name('asked_question');
    Route::post('add_question_asnwer',[AboutUsController::class,'add_question_asnwer'])->name('add_question_asnwer');
    Route::get('delete_question_answer/{id}', [AboutUsController::class,'delete_question_answer'])->name('delete_question_answer');

    Route::get('edit_last_about_banner',[AboutUsController::class,'edit_last_about_banner'])->name('edit_last_about_banner');
    Route::post('update_last_about_banner',[AboutUsController::class,'update_last_about_banner'])->name('update_last_about_banner');

    Route::get('edit_contact_us',[AboutUsController::class,'edit_contact_us'])->name('edit_contact_us');
    Route::post('contact_us_address', [AboutUsController::class,'contact_us_address'])->name('contact_us_address');


    Route::get('blogs',[BlogController::class,'index'])->name('blogs');
    Route::get('create_blog',[BlogController::class,'create'])->name('create_blog');
    Route::post('create_blog_db',[BlogController::class,'create_blog_db'])->name('create_blog_db');
    Route::get('edit_blog/{id}',[BlogController::class,'edit_blog'])->name('edit_blog');
    Route::post('update_blog',[BlogController::class,'update'])->name('update_blog');
    Route::get('delete_blog/{id}',[BlogController::class,"delete_blog"])->name('delete_blog');
});


Route::get('/',[FrontController::class,"index"])->name('index');

Route::get('about_us',[FrontController::class,"about_us"])->name('about-us');



Route::get('service',[FrontController::class,"service"])->name('service');
Route::post('get_services_for_home',[FrontController::class,"get_services_for_home"])->name('get_services_for_home');
Route::post('get_work_on_home',[FrontController::class,"get_work_on_home"])->name('get_work_on_home');
Route::get('get_all_work_on_home',[FrontController::class,"get_all_work_on_home"])->name('get_all_work_on_home');

Route::get('blog_and_news',[FrontController::class,"blog_and_news"])->name('blog_and_news');
Route::get('blog_detail/{slug}',[FrontController::class,"blog_details"])->name('blog_details');

Route::get('contact',[FrontController::class,"contact"])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('contact_us',[FrontController::class,"contact_us"]);

Route::get('get_header_services',[FrontController::class,'get_header_services']);
Route::get('service_detail_for_user/{id}',[FrontController::class,'service_detail_for_user']);

Route::post('get_work_specific_service',[FrontController::class,'get_work_specific_service']);
