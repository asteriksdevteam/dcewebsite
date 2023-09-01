<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\HomeBannerImages;
use App\Models\HomeTechnologies;
use App\Models\HomeContentOne;
use App\Models\HomeContentSecond;
use App\Models\HomeContentThird;
use App\Models\LoyalCustomers;
use App\Models\LoyalCustomersImages;
use App\Models\HomeContentFourth;
use App\Models\Testimonails;
use Location;

class FrontController extends Controller
{
    public function index()
    {
        $HomeBanner = HomeBanner::first();
        $HomeBannerImages = HomeBannerImages::get();

        $HomeTechnologies = HomeTechnologies::first();

        $HomeContentOne = HomeContentOne::first();
        $HomeContentSecond = HomeContentSecond::first();
        $HomeContentThird = HomeContentThird::first();
        $LoyalCustomers = LoyalCustomers::first();
        $LoyalCustomersImages = LoyalCustomersImages::get();
        $HomeContentFourth = HomeContentFourth::first();
        $Testimonails = Testimonails::get();

        return view('user_panel.index',compact('HomeBanner', 'HomeBannerImages', 'HomeTechnologies', 'HomeContentOne', 'HomeContentSecond', 'HomeContentThird', 'LoyalCustomers','LoyalCustomersImages','HomeContentFourth','Testimonails'));
    }

    public function about_us()
    {
        return view('user_panel.aboutus');
    }

    public function service()
    {
        return view('user_panel.service');
    }

    public function blog_and_news()
    {
        return view('user_panel.blog_and_news');
    }

    public function blog_details()
    {
        return view('user_panel.blog_detail');
    }

    public function contact()
    {
        return view('user_panel.contact');
    }

    public function contact_us(Request $request)
    {
        // dd($request->all());
        $ip = $request->ip();
        $data = \Location::get($ip);
        dd($data);
    }
}
