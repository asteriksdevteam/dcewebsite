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
use App\Models\ServiceDetail;
use App\Models\ServiceDetailProcess;
use App\Models\AboutUsBanner;
use App\Models\WhoWeAre;
use App\Models\MissionVision;
use App\Models\OurPhilosophy;
use App\Models\QuestionAnswer;
use App\Models\LastAboutBanner;
use App\Models\OfficeAddress;
use App\Models\Blog;
use App\Models\MetaTag;
use App\Models\Packages;
use App\Models\YearlyDiscount;
use App\Models\FooterContent;
use App\Models\TermsCondition;
use App\Models\PrivacyPolicy;
use App\Models\AboutCounter;
use Illuminate\Support\Str;
use App\Models\BlogFeed;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Drivers\Driver;
use App\Models\ServiceTestimonial;
use App\Models\Currency;
use App\Models\PackagesPrices;
use DB;
use Auth;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function __construct() 
    {
        $this->middleware('role:Meta Tags Manager|Super Admin', ['only' => [
            'add_meta_tags', 'create_meta_tag', 'edit_meta_tag', 'update_meta_tag', 'delete_meta_tag',  
        ]]);
    }

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
        
        $SubCategoryItem = SubCategoryItem::with('SubCategoryItemImages')->limit(5)->get();
        
        $SubCategoryItemId = SubCategoryItem::select('id')->limit(5)->get();
        
        $SubCategoryItemImages = SubCategoryItemImages::whereIn('sub_categories_items_id',$SubCategoryItemId)->limit(12)->get();
        
        $Category = Category::get();
        $MetaTag = MetaTag::get();
        
        // $FourSubCategory = SubCategory::where('sub_category_name','Branding')
        //                         ->orwhere('sub_category_name','Blog Management')
        //                         ->orwhere('sub_category_name','Website Development')
        //                         ->orwhere('sub_category_name','Software Development')
        //                         ->with([
        //                                 'Packages' => function ($query) 
        //                                 {
        //                                     $query->where('package_type', 'intermediate');
        //                                     $query->where('package_type', 'others');
        //                                 },
        //                                 'Packages.PackagesPrices' => function ($query) 
        //                                 {
        //                                     $query->orderBy('country_actual_price');
        //                                 },
        //                                 'Packages.PackagesPrices.Currency'
        //                             ])
        //                         ->limit(4)
        //                         ->get(); 
        
        $FourSubCategory = SubCategory::where('sub_category_name','Branding')
                                ->orwhere('sub_category_name','Blog Management')
                                ->orwhere('sub_category_name','Website Development')
                                ->orwhere('sub_category_name','Software Development')
                                ->with(['Packages',
                                        'Packages.PackagesPrices' => function ($query) 
                                        {
                                            $query->orderBy('country_actual_price');
                                        },
                                        'Packages.PackagesPrices.Currency'
                                    ])
                                ->limit(4)
                                ->get(); 
        
                                
        // dd($FourSubCategory);
        
        // $FourSubCategory[0]->Packages[0]->subcategory
                                
        $YearlyDiscount = YearlyDiscount::first();

        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/' ? MetaTag::where('page','home')->first() : '';

        return view('user_panel.index',compact('HomeBanner','YearlyDiscount','FourSubCategory','GetMetaTags','Category','SubCategoryItem','SubCategoryItemImages','OurServicesHomeFirst','OurServicesHome' , 'HomeBannerImages', 'HomeTechnologies', 'HomeContentOne', 'HomeContentSecond', 'HomeContentThird', 'LoyalCustomers','LoyalCustomersImages','HomeContentFourth','Testimonails'));
    }

    public function about_us()
    {
        $AboutUsBanner = AboutUsBanner::first();
        $WhoWeAre = WhoWeAre::first();
        $MissionVision = MissionVision::first();
        $LoyalCustomers = LoyalCustomers::first();
        $LoyalCustomersImages = LoyalCustomersImages::get();
        $OurPhilosophy = OurPhilosophy::first();
        $QuestionAnswer = QuestionAnswer::get();
        $LastAboutBanner = LastAboutBanner::first();
        $Category = Category::get();
        $AboutCounter = AboutCounter::first();

        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/about-us' ? MetaTag::where('page','about-us')->first() : '';
        

        return view('user_panel.aboutus',compact('LastAboutBanner', 'AboutCounter','Category','GetMetaTags','AboutUsBanner','QuestionAnswer','OurPhilosophy','WhoWeAre','MissionVision','LoyalCustomers','LoyalCustomersImages'));
    }

    public function service()
    {
        return view('user_panel.service');
    }

    public function blog_and_news()
    {
        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/blog-and-news' ? MetaTag::where('page','blog_and_news')->first() : '';

        $Blog = Blog::orderBy('date', 'desc')->where('status','Active')->limit(6)->get();
        

        $Category = Category::get();

        $recentBlogs = Blog::orderBy('date', 'desc')->limit(3)->get();
        
        $categories = Category::get();

        $categoryIds = $categories->pluck('id')->implode(',');

        return view('user_panel.blog_and_news', compact('Blog','categoryIds','GetMetaTags','recentBlogs','Category'));
    }

    public function blog_details($slug)
    {
        $Blog = Blog::where('slug',$slug)->first();
        $BlogCategoryWise = Blog::where('category',$Blog->category)->orderBy('created_at', 'desc')->limit(3)->get();
        $BlogSlug = $Blog->slug;
        $Category = Category::get();
        $RecentBlog = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        $BlogFeed = BlogFeed::first();

        $URL = "https://www.digicontentexperts.com/blog-detail/".$slug;

        $OG_Title = $Blog->blog_name;
        $OG_Image = $Blog->blog_image_thumb;
        $OG_URL = $URL;
        $OG_Site_Name = "https://www.digicontentexperts.com/";
        $OG_Description = $Blog->blog_short_description;
        
        
        $shareComponent = \Share::currentPage()
        ->facebook()
        ->twitter()
        ->linkedin();

        // $shareComponent = \Share::page($URL,
        //     $Blog->blog_name,
        // )
        // ->facebook()
        // ->twitter()
        // ->linkedin();

        return view('user_panel.blog_detail', compact('Blog','BlogFeed','BlogCategoryWise','Category', 'BlogSlug','RecentBlog', 'shareComponent', 'OG_Title', 'OG_Image', 'OG_URL', 'OG_Site_Name', 'OG_Description'));
    }

    public function contact()
    {
        $LoyalCustomers = LoyalCustomers::first();
        $LoyalCustomersImages = LoyalCustomersImages::get();
        $Category = Category::get();
        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/contact' ? MetaTag::where('page','contact-us')->first() : '';
        $OfficeAddress = OfficeAddress::first();
        return view('user_panel.contact',compact('OfficeAddress','Category','GetMetaTags','LoyalCustomers','LoyalCustomersImages'));
    }

    public function get_services_for_home(Request $request)
    {
        $OurServicesHome = OurServicesHome::where('id',$request->val)->first();
        
        $SubCategory = SubCategory::where('sub_category_name',$OurServicesHome->name)->first();
        
        $image = "";
        $image .= '<img src="'.asset($OurServicesHome->image).'" id="tabImg" class="service2img" width="290" height="518" alt="dce-image">';

        $content = "";

        $content .= '<div class="bluediv-inner">';
        $content .= '<p id="tabDescription" class="para text-white">'.$OurServicesHome->description.'</p>';
        $content .= '</div>';
        $content .= '<div class="d-flex align-items-center">';
        $content .= '<div class="left">';
        $content .= '<div class="dlink">';
        $content .= '<a href="'. url('service/'.$SubCategory->slug) .'" class="discuss">Let’s Discuss</a>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="right">';
        $content .= '<i class="fa fa-arrow-right angleicon2"></i>';
        $content .= '</div>';
        $content .= '</div>';

        return response()->json(['image' => $image, 'content' => $content]);
    }

    public function get_work_on_home(Request $request)
    {
        $SubCategoryItemImages = SubCategoryItemImages::where('sub_categories_items_id',$request->id)->get();
        
        $image = "";
        foreach($SubCategoryItemImages as $item)
        {
            $image .= "<div class='col-lg-3 col-md-6'>";
            $image .= "<div class='window1'>";
            $image .= "<div class='bigimage' style='background: url(".asset($item->images).") no-repeat;'></div>";
            $image .= "</div>";
            $image .= "</div>";
        }

        return response()->json(['image' => $image]);
    }

    public function get_all_work_on_home()
    {
        $SubCategoryItemImages = SubCategoryItemImages::limit(12)->get();
        $image = "";
        foreach($SubCategoryItemImages as $item)
        {
            $image .= "<div class='col-lg-3 col-md-6'>";
            $image .= "<div class='window1'>";
            $image .= "<div class='bigimage' style='background: url(".asset($item->images).") no-repeat;'></div>";
            $image .= "</div>";
            $image .= "</div>";
        }

        return response()->json(['image' => $image]);
    }

    public function contact_us(Request $request)
    {
        $ip = $request->ip();
        $location = Location::get($ip);
        
        $data = array();
        
        if($request->package_id)
        {
            $data['package_id'] = $request->package_id;
        }
        if($request->header_currency)
        {
            $data['currency'] = $request->header_currency;
        }
        if($request->yearly_or_monthly)
        {
            $data['yearly_monthly'] = $request->yearly_or_monthly;
        }
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
        if($location->countryName)
        {
            $data['countryName'] = $location->countryName;
        }
        if($location->countryCode)
        {
            $data['countryCode'] = $location->countryCode;
        }
        if($location->regionCode)
        {
            $data['regionCode'] = $location->regionCode;
        }
        if($location->regionName)
        {
            $data['regionName'] = $location->regionName;
        }
        if($location->cityName)
        {
            $data['cityName'] = $location->cityName;
        }
        if($location->zipCode)
        {
            $data['zipCode'] = $location->zipCode;
        }
        if($location->latitude)
        {
            $data['latitude'] = $location->latitude;
        }
        if($location->longitude)
        {
            $data['longitude'] = $location->longitude;
        }
        if($location->timezone)
        {
            $data['timezone'] = $location->timezone;
        }
        
        $ContactUs = ContactUs::create($data);

        return response()->json(['success'=> 'Updated Successfully!']);
    }

    public function get_header_services()
    {
        $Category = Category::with('SubCategory')->get();
        $html = "";
        
        foreach($Category as $item)
        {
            $html .= '<div class="col-md-3 position-relative">';
            $html .= '<div class="widget widgetfirst">';
            $html .= '<h6>'.$item->category_name.'</h6>';
            $html .= '</div>';
            $html .= '<div class="mega-list mega-firstlist">';
            $html .= '<ul>';
            if ($item->SubCategory->count() > 0) {
                foreach ($item->SubCategory as $subcategory) {
                    $html .= '<li><a href="'. url('service/'.$subcategory->slug) .'">' . $subcategory->sub_category_name . '</a></li>';
                }
            } else {
                $html .= '<li>No subcategories available.</li>';
            }

            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<img src="http://www.digicontentexperts.com/public/user_assets/images/mark.svg" class="mega-img1" alt="dce-image">';
            $html .= '</div>';
        }
        return response()->json($html);
    }

    public function service_detail_for_user($slug)
    {
        $SubCategory = SubCategory::with('SubCategoryItem.SubCategoryItemImages')->where('slug',$slug)->first();
        
        $SubCategoryItem = SubCategoryItem::with('SubCategoryItemImages')->where('sub_category_id',$SubCategory->id)->get();

        $SubCategoryItemSelectId = SubCategoryItem::select('id')->where('sub_category_id',$SubCategory->id)->get();
        
        $SubCategoryItemImages = SubCategoryItemImages::whereIn('sub_categories_items_id', $SubCategoryItemSelectId)->get();

        $ServiceDetail = ServiceDetail::where('sub_category',$SubCategory->id)->first();

        $SubCategorySlug = $SubCategory->slug;
        
        $ServiceDetailProcess = ServiceDetailProcess::where('service_detail_id',$ServiceDetail->id)->get();

        $Category = Category::get();
        
        $Packages_type = Packages::with('PackagesPrices')->where('subcategory',$SubCategory->id)->first();
        
        if($Packages_type != null)
        {
           if($Packages_type->package_type == "others")
            {
                $Packages = Packages::with('PackagesPrices')->where('subcategory',$SubCategory->id)->where('package_type','others')->limit(3)->get();
            }
            elseif($Packages_type->subcategory != null && $Packages_type->package_type == null && $Packages_type->name == null && $Packages_type->discription == null && $Packages_type->Package_list != null)
            {
                $Packages = Packages::where('subcategory',$SubCategory->id)->limit(1)->get();
            }
            else
            {
                $Packages = Packages::with('PackagesPrices')->where('subcategory',$SubCategory->id)->where('package_type','basic')->limit(3)->get();
            } 
        }
        else
        {
            $Packages = [];
        }
        
        $SubCategoryId = $SubCategory->id;

        $YearlyDiscount = YearlyDiscount::first();
        
        $HomeTechnologies = HomeTechnologies::first();

        $ServiceTestimonial = ServiceTestimonial::where('service_id',$ServiceDetail->id)->first();

        if($ServiceTestimonial == null || $ServiceDetail == null)
        {
            return view('UnderConstruction', compact('ServiceTestimonial', 'ServiceDetail','HomeTechnologies','YearlyDiscount','SubCategoryId','Packages','Category','SubCategorySlug' ,'SubCategoryItemImages' ,'ServiceDetailProcess','SubCategoryItem'));
        }
        
        return view('user_panel.service', compact('ServiceTestimonial', 'ServiceDetail','HomeTechnologies','YearlyDiscount','SubCategoryId','Packages','Category','SubCategorySlug' ,'SubCategoryItemImages' ,'ServiceDetailProcess','SubCategoryItem'));
    }

    public function get_work_specific_service(Request $request)
    {
        $SubCategoryItemImages = SubCategoryItemImages::where('sub_categories_items_id',$request->id)->get();

        $domainUrl = config('app.url');

        $image = "";
        foreach($SubCategoryItemImages as $item)
        {
            $image .= "<div class='col-lg-3 col-md-6'>";
            $image .= "<div class='window'>";
            $image .= "<img src='".asset($item->images)."' style='width: 300px; height: 200px;' alt='dce-image'>";
            $image .= "</div>";
            $image .= "</div>";
        }

        return response()->json(['image' => $image]);
    }
    
    public function add_meta_tags()
    {
        $MetaTag = MetaTag::get();

        $created_pages = array();

        foreach($MetaTag as $item)
        {
            $created_pages[] = $item->page;
        }

        $pages = ['home', 'contact-us', 'blog_and_news', 'about-us', 'terms_and_conditions', 'privacy_policy'];


        $common_pages = array_intersect($created_pages, $pages);

        $created_only_pages = array_diff($created_pages, $pages);

        $pages_only = array_diff($pages, $created_pages);

        return view('admin_panel.meta', compact('MetaTag', 'pages_only'));
    }

    public function create_meta_tag(Request $request)
    {
        $MetaTag = MetaTag::create([
            'page' => $request->page,
            'meta_title' => $request->meta_title,
            'meta_keyword' => implode(',',$request->meta_keyword),
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with('success', 'Created Successfully!'); 
    }

    public function edit_meta_tag($id)
    {
        $MetaTag = MetaTag::where('id',$id)->first();
        $meta_keyword = explode(',',$MetaTag->meta_keyword);
        
        return view('admin_panel.edit_meta', compact('MetaTag','meta_keyword')); 
    }

    public function update_meta_tag(Request $request)
    {
        $data = array();

        if($request->page)
        {
            $data['page'] = $request->page;
        }
        if($request->meta_title)
        {
            $data['meta_title'] = $request->meta_title;
        }
        if($request->meta_keyword)
        {
            $data['meta_keyword'] = implode(',',$request->meta_keyword);
        }
        if($request->meta_description)
        {
            $data['meta_description'] = $request->meta_description;
        }

        $MetaTag = MetaTag::where('id',$request->id)->update($data);

        return redirect()->back()->with('success', 'Created Successfully!'); 
    }

    public function delete_meta_tag($id)
    {
        $MetaTag = MetaTag::where('id',$id)->first();
        $MetaTag->delete();

        return redirect()->back()->with('error', 'Deleted Successfully!'); 
    }

    public function get_intermediate_packages_on_service(Request $request)
    {
        $intermediate = $request->data;
        $Packages = Packages::with(
                                        [
                                            'PackagesPrices' => function ($query) use ($request) 
                                            {
                                                $query->where('country_name', $request->currencyValue);
                                            },
                                            'PackagesPrices.Currency'
                                        ]
                                    )
                                    ->where('subcategory', $request->SubCategoryId)
                                    ->where('package_type', $intermediate)
                                    ->get();

        $Html = "";
        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->isChecked === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->isChecked === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
                    $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">Custom Price</h3></sup></div></div>';
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
            };  
        }
        else
        {
            $Html .= "";
        }
        
        
        return response()->json(['data' => $Html]);
    }

    public function get_advance_packages_on_service(Request $request)
    {
        $advance = $request->data;
        $Packages = Packages::with(
                                    [
                                        'PackagesPrices' => function ($query) use ($request) 
                                        {
                                            $query->where('country_name', $request->currencyValue);
                                        },
                                        'PackagesPrices.Currency'
                                    ]
                                )
                                ->where('subcategory', $request->SubCategoryId)
                                ->where('package_type', $advance)
                                ->get();
        $Html = "";
        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->isChecked === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->isChecked === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
                    $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">Custom Price</h3></sup></div></div>';
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
            };  
        }
        else
        {
            $Html .= "";
        }

        return response()->json(['data' => $Html]);
    }

    public function get_basic_packages_on_service(Request $request)
    {

            $basic = $request->data;
            $Packages = Packages::with(
                                        [
                                            'PackagesPrices' => function ($query) use ($request) 
                                            {
                                                $query->where('country_name', $request->currencyValue);
                                            },
                                            'PackagesPrices.Currency'
                                        ]
                                    )->where('subcategory', $request->SubCategoryId)
                                    ->where('package_type', $basic)
                                    ->get();            

        $Html = "";
        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->isChecked === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->isChecked === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
                    $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">Custom Price</h3></sup></div></div>';
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
    
        };
        }
        else
        {
            $Html .= "";
        }
        
        return response()->json(['data' => $Html]);
    }
    
    public function get_others_packages_on_service(Request $request)
    {
        $other = $request->data;
        $Packages = Packages::with(
                                    [
                                        'PackagesPrices' => function ($query) use ($request) 
                                        {
                                            $query->where('country_name', $request->currencyValue);
                                        },
                                        'PackagesPrices.Currency'
                                    ]
                                )
                                ->where('subcategory', $request->SubCategoryId)
                                ->where('package_type', $other)
                                ->get();
        
        $Html = "";
        $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';

        foreach($Packages as $key => $item) 
        {
            if($item->PackagesPrices != null)
            {
                $Html .= '<input type="hidden" value="'. $item->id .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                $Html .= '<div class="col-lg-4 col-md-6">';
                $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                $Html .= '<div class="pricingbox">';
                $Html .= '<div class="pricingheader">';
                $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
    
                if($request->isChecked === "off")
                {
                    $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                }
                if($request->isChecked === "on")
                {
                    $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                }
                $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                $Html .= '</div>';
                $Html .= '<div class="pricing-wrapper">';
                $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                $Html .= '<div class="pricingbody-footer">';
                $Html .= '<div class="row m-0">';
                $Html .= '<div class="col-lg-6 col-6">';
                $Html .= '<p>Share your idea?</p>';
                $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                $Html .= '</div>';
                $Html .= '<div class="col-lg-6 col-6">';
                $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                $Html .= '<p>Want to Discuss?</p>';
                $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
                $Html .= '</div>';
            }
            else
            {
                $Html .= '';
            }

        };
        return response()->json(['data' => $Html]);
    }
    
    public function get_services_for_footer()
    {
        $SubCategoryOne = SubCategory::select('sub_category_name', 'slug')
                                    ->where('sub_category_name', 'SEO')
                                    ->orWhere('sub_category_name', 'Social Media Marketing')
                                    ->orWhere('sub_category_name', 'Website Development')
                                    ->orWhere('sub_category_name', 'Software Development')
                                    ->get();

        $HtmlOne = "";
        foreach($SubCategoryOne as $item)
        {
            $HtmlOne .= "<li><a href='".url('service/'.$item->slug)."'>".$item->sub_category_name."</a></li>";
        }

        $FooterContent = FooterContent::first();

        $OfficeAddress = OfficeAddress::first();
        
        return response()->json(["HtmlOne" => $HtmlOne, "FooterContent" => $FooterContent->text, "OfficeAddress" => $OfficeAddress->office_detail]);
    }

    public function termsandcondition()
    {
        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/termsandcondition' ? MetaTag::where('page','terms_and_conditions')->first() : '';
        $Category = Category::get();
        $TermsCondition = TermsCondition::first();
        return view("user_panel.termsandcondition", compact('TermsCondition','Category','GetMetaTags'));
    }

    public function privacypolicy()
    {
        $GetMetaTags = $_SERVER['REQUEST_URI'] === '/privacypolicy' ? MetaTag::where('page','privacy_policy')->first() : '';
        $Category = Category::get();
        $PrivacyPolicy = PrivacyPolicy::first();
        return view("user_panel.privacypolicy", compact('PrivacyPolicy','Category','GetMetaTags'));
    }
    
    public function home_page_packages(Request $request)
    {
        $Packages = Packages::with(
                                    [
                                        'PackagesPrices' => function ($query) use ($request) 
                                        {
                                            $query->where('country_name', $request->currencyValue);
                                        },
                                        'PackagesPrices.Currency'
                                    ],
                                )
                                ->where('subcategory', $request->id)
                                ->get();
        // dd($Packages);
        $Html = "";

        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->subcategory .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->HomeYearlyCheckBox === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->HomeYearlyCheckBox === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '';
                }
            };
        }
        else
        {
            $Html .= '';
        }

        return response()->json(['data' => $Html]);
    }
    
    public function home_page_packages_on_yearly_check_box(Request $request)
    {
        $Packages = Packages::with(
                                    [
                                        'PackagesPrices' => function ($query) use ($request) 
                                        {
                                            $query->where('country_name', $request->currencyValue);
                                        },
                                        'PackagesPrices.Currency'
                                    ],
                                )
                                ->where('subcategory', $request->Id)
                                ->get();
        $Html = "";

        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->subcategory .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->HomeYearlyCheckBox === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->HomeYearlyCheckBox === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '';
                }
            };
        }
        else
        {
            $Html .= '';
        }

        // dd($Html, $request->all(), $Packages);


        return response()->json(['data' => $Html]);
    }

    public function HomePageCurrencyPackages(Request $request)
    {
        $Packages = Packages::with(
                                    [
                                        'PackagesPrices' => function ($query) use ($request) 
                                        {
                                            $query->where('country_name', $request->currencyValue);
                                        },
                                        'PackagesPrices.Currency'
                                    ],
                                )
                                ->where('subcategory', $request->id)
                                ->get();
                                
        $Html = "";

        if(count($Packages) != 0)
        {
            $Html .= '<input type="hidden" value="'. $Packages[0]->subcategory .'" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">';
            foreach($Packages as $key => $item) 
            {
                if($item->PackagesPrices != null)
                {
                    $Html .= '<input type="hidden" value="'. $item->subcategory .'" id="hiddenfieldofid" class="hiddenfieldofid">';
                    $Html .= '<div class="col-lg-4 col-md-6">';
                    $Html .= '<div class="' . ($key == 1 ? "seconddiv" : "") . ' card prcing-card">';
                    $Html .= '<div class="pricingbox">';
                    $Html .= '<div class="pricingheader">';
                    $Html .= '<h3 class="subtitle pheading">'. $item->name .'</h3>';
        
                    if($request->HomeYearlyCheckBox === "off")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sub><del>'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_cut_price .'</del></sub></div><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_price .'</h3></sup></div></div>';
                    }
                    if($request->HomeYearlyCheckBox === "on")
                    {
                        $Html .= '<div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">'. $item->PackagesPrices->Currency->symbol ."". $item->PackagesPrices->country_actual_yearly_price .'</h3></sup></div></div>';
                    }
                    $Html .= '<p class="' . ($key == 1 ? "text-white" : "") . '">'. Str::limit($item->discription, 100) .'</p>';
                    $Html .= '</div>';
                    $Html .= '<div class="pricing-wrapper">';
                    $Html .= '<div class="pricingbody">'. $item->Package_list .'</div>';
                    $Html .= '<div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="'. $item->id .'" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>';
                    $Html .= '<div class="pricingbody-footer">';
                    $Html .= '<div class="row m-0">';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<p>Share your idea?</p>';
                    $Html .= '<a href="tel:+17372557407">+17372557407</a>';
                    $Html .= '</div>';
                    $Html .= '<div class="col-lg-6 col-6">';
                    $Html .= '<div class="pricingbody-rightdiv float-end text-end">';
                    $Html .= '<p>Want to Discuss?</p>';
                    $Html .= '<a href="javascript:void();">Live Chat Now</a>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                    $Html .= '</div>';
                }
                else
                {
                    $Html .= '';
                }
            };
        }
        else
        {
            $Html .= '';
        }

        return response()->json(['data' => $Html]);
    }

    public function blogeSearch(Request $request)
    {  
        if($request->category)
        {
            $category = explode(",", $request->category);
            $Blog = Blog::whereIn('category', explode(",", $request->category))->orderBy('created_at', 'desc')->where('status','Active')->get();
            $html = "";
            $blogCount = 0;
            foreach($Blog as $item)
            {
                $html .= '<div class="col-lg-4 col-md-6 col-xs-12">';
                $html .= '<div class="blogcard">';     
                $html .= '<div class="blogcard-header">';
                $html .= '<img src="'. asset($item->blog_image_thumb) .'" alt="dce-image" />';
                $html .= '</div>';
                $html .= '<div class="blogcard-content">';
                $html .= '<p class="para mt-2">'. Carbon::parse($item->date)->format('M d, Y') .'<span class="highlight"> / Admin</span></p>';
                $html .= '<a href="'. url('blog-detail/'.$item->slug) .'"><h3><span class="highlight">'. Str::limit($item->blog_name, 30) .'</span></h3></a>';
                $html .= '<p class="paras">'. Str::limit($item->blog_short_description, 100) .' </p>';
                $html .= '</div>';     
                $html .= '</div>';
                $html .= '</div>';
                $blogCount++;

            }
            $html .= '<div class="col-12 text-center">';
            $html .= '<button class="mx-auto d-block estimate btn-sm loadMoreBlogs" data-count="'. $blogCount .'">Load More</button>';
            $html .= '</div>';

            return response()->json(["data" => $html]);
        }
        if(empty($request->keyword) === true)
        {            
            $Blog = Blog::orderBy('created_at', 'desc')->where('status','Active')->get();
            $html = "";
            $blogCount = 0;
            foreach($Blog as $item)
            {
                $html .= '<div class="col-lg-4 col-md-6 col-xs-12">';
                $html .= '<div class="blogcard">';     
                $html .= '<div class="blogcard-header">';
                $html .= '<img src="'. asset($item->blog_image_thumb) .'" alt="dce-image" />';
                $html .= '</div>';
                $html .= '<div class="blogcard-content">';
                $html .= '<p class="para mt-2">'. Carbon::parse($item->date)->format('M d, Y') .'<span class="highlight"> / Admin</span></p>';
                $html .= '<a href="'. url('blog-detail/'.$item->slug) .'"><h3><span class="highlight">'. Str::limit($item->blog_name, 30) .'</span></h3></a>';
                $html .= '<p class="paras">'. Str::limit($item->blog_short_description, 100) .' </p>';
                $html .= '</div>';     
                $html .= '</div>';
                $html .= '</div>';
                $blogCount++;
            }
            $html .= '<div class="col-12 text-center">';
            $html .= '<button class="mx-auto d-block estimate btn-sm loadMoreBlogs" data-count="'. $blogCount .'">Load More</button>';
            $html .= '</div>';
            return response()->json(["data" => $html]);
        }
        else if($request->keyword)
        {
            $keyword = $request->keyword;
            $Blog = Blog::where('blog_name', 'like', '%' . $keyword . '%')->orderBy('created_at', 'desc')->where('status','Active')->get();
            $html = "";
            $blogCount = 0;
            foreach($Blog as $item)
            {
                $html .= '<div class="col-lg-4 col-md-6 col-xs-12">';
                $html .= '<div class="blogcard">';     
                $html .= '<div class="blogcard-header">';
                $html .= '<img src="'. asset($item->blog_image_thumb) .'" alt="dce-image" />';
                $html .= '</div>';
                $html .= '<div class="blogcard-content">';
                $html .= '<p class="para mt-2">'. Carbon::parse($item->date)->format('M d, Y') .'<span class="highlight"> / Admin</span></p>';
                $html .= '<a href="'. url('blog-detail/'.$item->slug) .'"><h3><span class="highlight">'. Str::limit($item->blog_name, 30) .'</span></h3></a>';
                $html .= '<p class="paras">'. Str::limit($item->blog_short_description, 100) .' </p>';
                $html .= '</div>';     
                $html .= '</div>';
                $html .= '</div>';
                $blogCount++;
            }
            $html .= '<div class="col-12 text-center">';
            $html .= '<button class="mx-auto d-block estimate btn-sm loadMoreBlogs" data-count="'. $blogCount .'">Load More</button>';
            $html .= '</div>';
            return response()->json(["data" => $html]);
        }
    }

    public function loadMoreBlogs(Request $request)
    {
        $actualCount = $request->count + 3;
        $Blog = Blog::orderBy('date', 'desc')->where('status','Active')->limit($actualCount)->get();
        $html = "";
        $blogCount = 0;
        foreach($Blog as $item)
        {
            $html .= '<div class="col-lg-4 col-md-6 col-xs-12">';
            $html .= '<div class="blogcard">';     
            $html .= '<div class="blogcard-header">';
            $html .= '<img src="'. asset($item->blog_image_thumb) .'" alt="dce-image" />';
            $html .= '</div>';
            $html .= '<div class="blogcard-content">';
            $html .= '<p class="para mt-2">'. Carbon::parse($item->date)->format('M d, Y') .'<span class="highlight"> / Admin</span></p>';
            $html .= '<a href="'. url('blog-detail/'.$item->slug) .'"><h3><span class="highlight">'. Str::limit($item->blog_name, 30) .'</span></h3></a>';
            $html .= '<p class="paras">'. Str::limit($item->blog_short_description, 100) .' </p>';
            $html .= '</div>';     
            $html .= '</div>';
            $html .= '</div>';
            $blogCount++;
        }
        $html .= '<div class="col-12 text-center">';
        $html .= '<button class="mx-auto d-block estimate btn-sm loadMoreBlogs" data-count="'. $blogCount .'">Load More</button>';
        $html .= '</div>';
        return response()->json(["data" => $html]);
    }

    public function HeaderCurrency(Request $request)
    {
        $Currency = Currency::get();
        
        $html = "";

        foreach($Currency as $item)
        {
            $html .= '<option value="' . htmlspecialchars($item->name) . '" data-image="' . asset($item->image) . '">' . htmlspecialchars($item->name) . '</option>';
        }

        return response()->json($html);
    }

    public function get_services_on_mobile()
    {
        $Category = Category::with('SubCategory')->get();
        $html = "";
        
        foreach($Category as $item)
        {
            $html .= '<div class="col-lg-3 col-md-12 col-sm-12">';
            $html .= '<div class="widget widgetfirst">';
            $html .= '<h6>'.$item->category_name.'</h6>';
            $html .= '</div>';
            $html .= '<div class="mega-list mega-firstlist">';
            $html .= '<ul>';
            if ($item->SubCategory->count() > 0) 
            {
                foreach ($item->SubCategory as $subcategory) 
                {
                    $html .= '<li><a href="'. url('service/'.$subcategory->slug) .'">'. $subcategory->sub_category_name .'</a></li>';
                }
            } 
            else {
                $html .= '<li>No subcategories available.</li>';
            }
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
        }
        return response()->json($html);
    }
    
    public function LeadForm()
    {
        $Category = Category::get();
        return view("lead_form", compact('Category'));
    }
    public function Submitleadform(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'categories' => 'required',
            'summary' => 'required',
        ]);
        
        
        $ip = $request->ip();
        $location = Location::get($ip);
        
        $data = array();
        
        if($request->company)
        {
            $data['company'] = $request->company;
        }
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
        if($request->categories)
        {
            $data['subject'] = $request->categories;
        }
        if($request->summary)
        {
            $data['text'] = $request->summary;
        }
        if($location->countryName)
        {
            $data['countryName'] = $location->countryName;
        }
        if($location->countryCode)
        {
            $data['countryCode'] = $location->countryCode;
        }
        if($location->regionCode)
        {
            $data['regionCode'] = $location->regionCode;
        }
        if($location->regionName)
        {
            $data['regionName'] = $location->regionName;
        }
        if($location->cityName)
        {
            $data['cityName'] = $location->cityName;
        }
        if($location->zipCode)
        {
            $data['zipCode'] = $location->zipCode;
        }
        if($location->latitude)
        {
            $data['latitude'] = $location->latitude;
        }
        if($location->longitude)
        {
            $data['longitude'] = $location->longitude;
        }
        if($location->timezone)
        {
            $data['timezone'] = $location->timezone;
        }
        
        $ContactUs = ContactUs::create($data);
        
        return redirect()->back()->with(['success'=> 'We have received your query. Our team will contact you soon.']);

    }
}
