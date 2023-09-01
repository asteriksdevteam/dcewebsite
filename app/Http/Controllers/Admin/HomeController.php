<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class HomeController extends Controller
{
    public function singleImage($image,$folder)
    {
        if ($image->isValid()) 
        {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($folder), $imageName);
            return $folder.'/'.$imageName;
        }
    }
    
    public function home_banner()
    {
        $HomeBanner = HomeBanner::first();
        $HomeBannerImages = HomeBannerImages::get();
        return view('admin_panel.home.banner', compact('HomeBanner','HomeBannerImages'));
    }

    public function update_home_banner(Request $request)
    {
        $validated = $request->validate([
            'heading_banner' => 'required',
            'content_banner' => 'required',
            // 'images' => 'required',
        ]);

        $data = array();

        if($request->heading_banner)
        {
            $data['heading_banner'] = $request->heading_banner;
        }
        if($request->content_banner)
        {
            $data['content_banner'] = $request->content_banner;
        }

        $HomeBanner = HomeBanner::where('id',$request->id)->update($data);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) 
            {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('home_banner_images'), $imageName);

                $HomeBannerImages = HomeBannerImages::create([
                    'images' => 'home_banner_images/'.$imageName,
                ]);
            }
        }
        
        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function delete_home_banner_images(Request $request)
    {
        $HomeBannerImages = HomeBannerImages::where('id',$request->val)->first();
        $HomeBannerImages->delete();
        return response()->json(['status' => 'success']);
    }

    public function home_technologies()
    {
        $HomeTechnologies = HomeTechnologies::first();
        return view('admin_panel.home.technologies', compact('HomeTechnologies'));
    }

    public function update_home_technologies (Request $request)
    {
        $validated = $request->validate([
            'heading_technologies' => 'required',
            'content_technologies' => 'required',
        ]);

        $data = array();

        if($request->heading_technologies)
        {
            $data['heading_technologies'] = $request->heading_technologies;
        }
        if($request->content_technologies)
        {
            $data['content_technologies'] = $request->content_technologies;
        }
        if($request->image_1)
        {
            $data['image_1'] = $this->singleImage($request->image_1,"home_technologies_images");
        }
        if($request->image_2)
        {
            $data['image_2'] = $this->singleImage($request->image_2,"home_technologies_images");
        }
        if($request->image_3)
        {
            $data['image_3'] = $this->singleImage($request->image_3,"home_technologies_images");
        }
        if($request->image_4)
        {
            $data['image_4'] = $this->singleImage($request->image_4,"home_technologies_images");
        }
        if($request->image_5)
        {
            $data['image_5'] = $this->singleImage($request->image_5,"home_technologies_images");
        }
        if($request->image_6)
        {
            $data['image_6'] = $this->singleImage($request->image_6,"home_technologies_images");
        }

        $HomeTechnologies = HomeTechnologies::where('id', $request->id)->update($data);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function home_content()
    {
        $HomeContentOne = HomeContentOne::first();
        return view('admin_panel.home.contentOne', compact('HomeContentOne'));
    }

    public function update_home_content_one(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:20|max:10000',
        ]);

        $data = array();

        if($request->content)
        {
            $data['content'] = $request->content;
        }
        if($request->image)
        {
            $data['image'] = $this->singleImage($request->image,"content_one");
        }

        $HomeContentOne = HomeContentOne::where('id',$request->id)->update($data);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function home_content_second()
    {
        $HomeContentSecond = HomeContentSecond::first();
        return view('admin_panel.home.contentSecond',compact('HomeContentSecond'));
    }

    public function update_home_content_second(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:20|max:10000',
            'heading1' => 'required',
            'content1' => 'required',
            'heading2' => 'required',
            'content2' => 'required',
            'heading3' => 'required',
            'content3' => 'required',
        ]);

        $data = array();

        if($request->content)
        {
            $data['content'] = $request->content;
        }
        if($request->heading1)
        {
            $data['heading_one'] = $request->heading1;
        }
        if($request->content1)
        {
            $data['content_one'] = $request->content1;
        }
        if($request->image1)
        {
            $data['image_one'] = $this->singleImage($request->image1,"content_second");
        }

        if($request->heading2)
        {
            $data['heading_second'] = $request->heading2;
        }
        if($request->content2)
        {
            $data['content_second'] = $request->content2;
        }
        if($request->image2)
        {
            $data['image_second'] = $this->singleImage($request->image2,"content_second");
        }

        if($request->heading3)
        {
            $data['heading_third'] = $request->heading3;
        }
        if($request->content3)
        {
            $data['content_third'] = $request->content3;
        }
        if($request->image3)
        {
            $data['image_third'] = $this->singleImage($request->image3,"content_second");
        }

        $HomeContentSecond = HomeContentSecond::where('id',$request->id)->update($data);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function home_content_third()
    {
        $HomeContentThird = HomeContentThird::first();
        return view('admin_panel.home.contentThird', compact('HomeContentThird'));
    }

    public function update_home_content_third(Request $request)
    {
        $validated = $request->validate([
            'heading1' => 'required',
            'content1' => 'required',
            'heading2' => 'required',
            'content2' => 'required',
            'heading3' => 'required',
            'content3' => 'required',
            'heading4' => 'required',
            'content4' => 'required',
        ]);

        $data = array();

        if($request->heading1)
        {
            $data['heading1'] = $request->heading1;
        }
        if($request->content1)
        {
            $data['content1'] = $request->content1;
        }
        if($request->image1)
        {
            $data['image1'] = $this->singleImage($request->image1,"content_third");
        }
        if($request->heading2)
        {
            $data['heading2'] = $request->heading2;
        }
        if($request->content2)
        {
            $data['content2'] = $request->content2;
        }
        if($request->image2)
        {
            $data['image2'] = $this->singleImage($request->image2,"content_third");
        }
        if($request->heading3)
        {
            $data['heading3'] = $request->heading3;
        }
        if($request->content3)
        {
            $data['content3'] = $request->content3;
        }
        if($request->image3)
        {
            $data['image3'] = $this->singleImage($request->image3,"content_third");
        }
        if($request->heading4)
        {
            $data['heading4'] = $request->heading4;
        }
        if($request->content4)
        {
            $data['content4'] = $request->content4;
        }
        if($request->image4)
        {
            $data['image4'] = $this->singleImage($request->image4,"content_third");
        }

        $HomeContentThird = HomeContentThird::where('id',$request->id)->update($data);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function loyal_customers()
    {
        $LoyalCustomers = LoyalCustomers::first();
        $LoyalCustomersImages = LoyalCustomersImages::get();
        return view('admin_panel.home.loyalCustomers', compact('LoyalCustomers', 'LoyalCustomersImages'));
    }

    public function update_loyal_customers(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

        $data = array();

        if($request->heading)
        {
            $data['heading'] = $request->heading;
        }
        if($request->content)
        {
            $data['content'] = $request->content;
        }

        $LoyalCustomers = LoyalCustomers::where('id',$request->id)->update($data);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) 
            {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('home_loyal_customers_images'), $imageName);

                $LoyalCustomersImages = LoyalCustomersImages::create([
                    'images' => 'home_loyal_customers_images/'.$imageName,
                ]);
            }
        }
        
        return redirect()->back()->with('message', 'Updated Successfully!');

    }

    public function delete_home_loyal_customers_images(Request $request)
    {
        $LoyalCustomersImages = LoyalCustomersImages::where('id',$request->val)->first();
        $LoyalCustomersImages->delete();
        return response()->json(['status' => 'success']);
    }

    public function home_content_fourth()
    {
        $HomeContentFourth = HomeContentFourth::first();
        return view('admin_panel.home.contentFourth', compact('HomeContentFourth'));
    }

    public function update_home_content_fourth(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'heading1' => 'required',
            'heading2' => 'required',
            'heading3' => 'required',
            'heading4' => 'required',
            'heading5' => 'required',
            'heading6' => 'required',
            'heading7' => 'required',
            'heading8' => 'required',
        ]);


        if($request->heading)
        {
            $data['heading'] = $request->heading;
        }
        if($request->content)
        {
            $data['content'] = $request->content;
        }
        if($request->heading1)
        {
            $data['heading1'] = $request->heading1;
        }
        if($request->image1)
        {
            $data['image1'] = $this->singleImage($request->image1,"content_fourth");
        }
        if($request->heading2)
        {
            $data['heading2'] = $request->heading2;
        }
        if($request->image2)
        {
            $data['image2'] = $this->singleImage($request->image2,"content_fourth");
        }
        if($request->heading3)
        {
            $data['heading3'] = $request->heading3;
        }
        if($request->image3)
        {
            $data['image3'] = $this->singleImage($request->image3,"content_fourth");
        }
        if($request->heading4)
        {
            $data['heading4'] = $request->heading4;
        }
        if($request->image4)
        {
            $data['image4'] = $this->singleImage($request->image4,"content_fourth");
        }
        if($request->heading5)
        {
            $data['heading5'] = $request->heading5;
        }
        if($request->image5)
        {
            $data['image5'] = $this->singleImage($request->image5,"content_fourth");
        }
        if($request->heading6)
        {
            $data['heading6'] = $request->heading6;
        }
        if($request->image6)
        {
            $data['image6'] = $this->singleImage($request->image6,"content_fourth");
        }
        if($request->heading7)
        {
            $data['heading7'] = $request->heading7;
        }
        if($request->image7)
        {
            $data['image7'] = $this->singleImage($request->image7,"content_fourth");
        }
        if($request->heading8)
        {
            $data['heading8'] = $request->heading8;
        }
        if($request->image8)
        {
            $data['image8'] = $this->singleImage($request->image8,"content_fourth");
        }

        $HomeContentFourth = HomeContentFourth::where('id',$request->id)->update($data);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function home_testimonials()
    {
        $Testimonails = Testimonails::get();
        return view('admin_panel.home.testimonials.list_testmonials', compact('Testimonails'));
    }

    public function add_testimonials_to_db(Request $request)
    { 
        $data = array();

        if($request->name)
        {
            $data['name'] = $request->name;
        }
        if($request->designation)
        {
            $data['designation'] = $request->designation;
        }
        if($request->comments)
        {
            $data['comment'] = $request->comments;
        }
        if($request->testimonial_images)
        {
            $data['image'] = $this->singleImage($request->testimonial_images,"testimonials");
        }

        $Testimonails = Testimonails::create($data);
         
        return response()->json(['status' => 'success']);
    }

    public function delete_testimonials($id)
    {
        $Testimonails = Testimonails::where('id',$id)->first();
        $Testimonails_Delete = $Testimonails->delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');
        
    }

    public function update_testimonails(Request $request)
    {
        $data = array();

        if($request->name)
        {
            $data['name'] = $request->name;
        }
        if($request->designation)
        {
            $data['designation'] = $request->designation;
        }
        if($request->comments)
        {
            $data['comment'] = $request->comments;
        }
        if($request->edit_testimonial_images)
        {
            $data['image'] = $this->singleImage($request->edit_testimonial_images,"testimonials");
        }

        $Testimonails = Testimonails::where('id',$request->edit_id)->update($data);

        return redirect()->back()->with('success', 'Edit Successfully!');
    }
}
