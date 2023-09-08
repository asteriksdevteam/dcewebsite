<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsBanner;
use App\Models\WhoWeAre;
use App\Models\MissionVision;
use App\Models\OurPhilosophy;

class AboutUsController extends Controller
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

    public function all_about_us_banner()
    {
        $AboutUsBanner = AboutUsBanner::first();
        return view('admin_panel.about_us.banner_section', compact('AboutUsBanner'));
    }

    public function update_about_banner(Request $request)
    {
        $validated = $request->validate([
            'banner_heading' => 'required',
            'banner_content' => 'required',
        ]);

        if($request->id == null)
        {
            $data = array();

            if($request->banner_heading)
            {
                $data['heading'] = $request->banner_heading;
            }
            if($request->banner_content)
            {
                $data['content'] = $request->banner_content;
            }
            $AboutUsBanner = AboutUsBanner::create($data);
        }
        else
        {
            $data = array();

            if($request->banner_heading)
            {
                $data['heading'] = $request->banner_heading;
            }
            if($request->banner_content)
            {
                $data['content'] = $request->banner_content;
            }
            $AboutUsBanner = AboutUsBanner::where('id', $request->id)->update($data);
        }
        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function who_we_are()
    {
        $WhoWeAre = WhoWeAre::first();
        return view('admin_panel.about_us.who_we_are', compact('WhoWeAre'));
    }

    public function update_who_we_are(Request $request)
    {
        $validated = $request->validate([
            'about_content' => 'required|min:200|max:2000',
        ]);

        if($request->id == null)
        {
            $data = array();

            if($request->about_content)
            {
                $data['about_content'] = $request->about_content;
            }
            if($request->about_image_who_we_are)
            {
                $data['image'] = $this->singleImage($request->about_image_who_we_are, 'about_image_who_we_are');
            }
            $WhoWeAre = WhoWeAre::create($data);
        }
        else
        {
            $data = array();

            if($request->about_content)
            {
                $data['about_content'] = $request->about_content;
            }
            if($request->about_image_who_we_are)
            {
                $data['image'] = $this->singleImage($request->about_image_who_we_are, 'about_image_who_we_are');
            }
            $WhoWeAre = WhoWeAre::where('id', $request->id)->update($data);
        }
        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function mission_vision()
    {
        $MissionVision = MissionVision::first();
        return view('admin_panel.about_us.mission_vision', compact('MissionVision'));
    }

    public function update_mission_vision(Request $request)
    {
        $validated = $request->validate([
            'about_content' => 'required|min:200|max:2000',
        ]);

        if($request->id == null)
        {
            $data = array();

            if($request->about_content)
            {
                $data['about_content'] = $request->about_content;
            }
            if($request->about_image_who_we_are)
            {
                $data['image'] = $this->singleImage($request->about_image_who_we_are, 'about_image_who_we_are');
            }
            $MissionVision = MissionVision::create($data);
        }
        else
        {
            $data = array();

            if($request->about_content)
            {
                $data['about_content'] = $request->about_content;
            }
            if($request->about_image_who_we_are)
            {
                $data['image'] = $this->singleImage($request->about_image_who_we_are, 'about_image_who_we_are');
            }
            $MissionVision = MissionVision::where('id', $request->id)->update($data);
        }
        return redirect()->back()->with('message', 'Updated Successfully!');
        
    }

    public function our_Philosophy()
    {
        $OurPhilosophy = OurPhilosophy::first();
        return view('admin_panel.about_us.our_Philosophy', compact('OurPhilosophy'));
    }

    public function update_our_philosophy(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'first_heading' => 'required',
            'first_content' => 'required|min:50|max:200',
            'second_heading' => 'required',
            'second_content' => 'required|min:50|max:200',
            'third_heading' => 'required',
            'third_content' => 'required|min:50|max:200',
            'fourth_heading' => 'required',
            'fourth_content' => 'required|min:50|max:200',
            'fifth_heading' => 'required',
            'fifth_content' => 'required|min:50|max:200',
            'sixth_heading' => 'required',
            'sixth_content' => 'required|min:50|max:200',
        ]);

        if($request->id == null)
        {
            $data = array();

            if($request->first_heading)
            {
                $data['first_heading'] = $request->first_heading;
            }
            if($request->first_content)
            {
                $data['first_content'] = $request->first_content;
            }
            if($request->second_heading)
            {
                $data['second_heading'] = $request->second_heading;
            }
            if($request->second_content)
            {
                $data['second_content'] = $request->second_content;
            }
            if($request->third_heading)
            {
                $data['third_heading'] = $request->third_heading;
            }
            if($request->third_content)
            {
                $data['third_content'] = $request->third_content;
            }
            if($request->fourth_heading)
            {
                $data['fourth_heading'] = $request->fourth_heading;
            }
            if($request->fourth_content)
            {
                $data['fourth_content'] = $request->fourth_content;
            }
            if($request->fifth_heading)
            {
                $data['fifth_heading'] = $request->fifth_heading;
            }
            if($request->fifth_content)
            {
                $data['fifth_content'] = $request->fifth_content;
            }
            if($request->sixth_heading)
            {
                $data['sixth_heading'] = $request->sixth_heading;
            }
            if($request->sixth_content)
            {
                $data['sixth_content'] = $request->sixth_content;
            }

            if($request->insert_philosophy_Image)
            {
                $data['image'] = $this->singleImage($request->insert_philosophy_Image, 'about_image_philosophy');
            }

            $OurPhilosophy = OurPhilosophy::create($data);
        }
        else
        {
            $data = array();

            if($request->first_heading)
            {
                $data['first_heading'] = $request->first_heading;
            }
            if($request->first_content)
            {
                $data['first_content'] = $request->first_content;
            }
            if($request->second_heading)
            {
                $data['second_heading'] = $request->second_heading;
            }
            if($request->second_content)
            {
                $data['second_content'] = $request->second_content;
            }
            if($request->third_heading)
            {
                $data['third_heading'] = $request->third_heading;
            }
            if($request->third_content)
            {
                $data['third_content'] = $request->third_content;
            }
            if($request->fourth_heading)
            {
                $data['fourth_heading'] = $request->fourth_heading;
            }
            if($request->fourth_content)
            {
                $data['fourth_content'] = $request->fourth_content;
            }
            if($request->fifth_heading)
            {
                $data['fifth_heading'] = $request->fifth_heading;
            }
            if($request->fifth_content)
            {
                $data['fifth_content'] = $request->fifth_content;
            }
            if($request->sixth_heading)
            {
                $data['sixth_heading'] = $request->sixth_heading;
            }
            if($request->sixth_content)
            {
                $data['sixth_content'] = $request->sixth_content;
            }
            if($request->insert_philosophy_Image)
            {
                $data['image'] = $this->singleImage($request->insert_philosophy_Image, 'about_image_philosophy');
            }

            $OurPhilosophy = OurPhilosophy::where('id', $request->id)->update($data);
        }
        return redirect()->back()->with('message', 'Updated Successfully!');
    }
}
