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
use App\Models\OurServicesHome;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use App\Models\SubCategoryItemImages;
use App\Models\ContactUs;
// use Location;

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
        $OurServicesHome = OurServicesHome::get();
        $OurServicesHomeFirst = OurServicesHome::first();
        $SubCategoryItem = SubCategoryItem::with('SubCategoryItemImages')->get();
        $SubCategoryItemImages = SubCategoryItemImages::get();
        // dd($SubCategoryItemImages);

        return view('user_panel.index',compact('HomeBanner','SubCategoryItem','SubCategoryItemImages','OurServicesHomeFirst','OurServicesHome' , 'HomeBannerImages', 'HomeTechnologies', 'HomeContentOne', 'HomeContentSecond', 'HomeContentThird', 'LoyalCustomers','LoyalCustomersImages','HomeContentFourth','Testimonails'));
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

    public function get_services_for_home(Request $request)
    {
        $OurServicesHome = OurServicesHome::where('id',$request->val)->first();

        $image = "";
        $image .= '<img src="'.$OurServicesHome->image.'" id="tabImg" class="service2img" width="290" height="518" alt="">';

        $content = "";
        $content .= $OurServicesHome->description;

        return response()->json(['image' => $image, 'content' => $content]);
    }

    public function get_work_on_home(Request $request)
    {
        $SubCategoryItemImages = SubCategoryItemImages::where('sub_categories_items_id',$request->id)->get();
        $image = "";
        foreach($SubCategoryItemImages as $item)
        {
            $image .= "<div class='col-lg-3 col-md-6'>";
            $image .= "<div class='window'>";
            $image .= "<img src='".$item->images."' style='width: 300px; height: 200px;' alt=''>";
            $image .= "</div>";
            $image .= "</div>";
        }

        return response()->json(['image' => $image]);
    }

    public function get_all_work_on_home()
    {
        $SubCategoryItemImages = SubCategoryItemImages::get();
        $image = "";
        foreach($SubCategoryItemImages as $item)
        {
            $image .= "<div class='col-lg-3 col-md-6'>";
            $image .= "<div class='window'>";
            $image .= "<img src='".$item->images."' style='width: 300px; height: 200px;' alt=''>";
            $image .= "</div>";
            $image .= "</div>";
        }

        return response()->json(['image' => $image]);
    }

    public function contact_us(Request $request)
    {
        // dd($request->all());

        $data = array();

        if($request->name)
        {
            $data['name'] = $request->name;
        }
        if($request->email)
        {
            $data['email'] = $request->email;
        }
        if($request->phone)
        {
            $data['phone'] = $request->phone;
        }
        if($request->subject)
        {
            $data['subject'] = $request->subject;
        }
        if($request->text)
        {
            $data['text'] = $request->text;
        }

        // dd($data);

        $ContactUs = ContactUs::create($data);

        return response()->json(['success'=> 'Updated Successfully!']);
    }
}
