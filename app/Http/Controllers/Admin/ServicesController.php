<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use App\Models\SubCategoryItemImages;
use App\Models\ServiceDetail;
use App\Models\ServiceDetailProcess;
use Illuminate\Support\Str;
use App\Models\ServiceTestimonial;


class ServicesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('role:Services-Manager|Super Admin', ['only' => [
            'category', 'create_category', 'edit_category', 'delete_category', 'sub_categories', 'create_sub_category', 'edit_sub_category', 'delete_sub_category',
            'sub_categories_item', 'create_sub_category_item', 'get_images_on_edit_work', 'delete_work_image', 'edit_sub_category_work', 'delete_sub_category_item', 
            'service_details', 'add_service_detail', 'create_service_detail', 'edit_service_detail', 'update_service_details', 'delete_service_detail', 'delete_specific_process'
        ]]);
    }

    public function singleImage($image,$folder)
    {
        if ($image->isValid()) 
        {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($folder), $imageName);
            return $folder.'/'.$imageName;
        }
    }
    
    public function category()
    {
        $Category = Category::get();
        return view("admin_panel.services.category", compact('Category'));
    }

    public function create_category(Request $request)
    {
        $Category = Category::create([
            "category_name" => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category Create Successfully!');
    }

    public function edit_category(Request $request)
    {
        $Category = Category::where('id',$request->edit_category_id)->update([
            "category_name" => $request->edit_category_name,
        ]);

        return redirect()->back()->with('success', 'Category Update Successfully!');
    }

    public function delete_category($id)
    {
        $Category = Category::with('SubCategory.ServiceDetail.ServiceDetailProcess')->where('id',$id)->first();

        $SubCategory = SubCategory::select('id')->where('category_id',$Category->id)->get();

        $ServiceDetail = ServiceDetail::select('id')->whereIn('sub_category',$SubCategory)->get();

        $ServiceDetailProcess = ServiceDetailProcess::whereIn('service_detail_id',$ServiceDetail)->get();

        if($ServiceDetailProcess->isEmpty() === false)
        {
            foreach($ServiceDetailProcess as $item)
            {
                $item->delete(); 
            }
        }
        
        $ServiceDetailDelete = ServiceDetail::whereIn('sub_category',$SubCategory)->get();
        
        if($ServiceDetailDelete->isEmpty() === false)
        {
            foreach($ServiceDetailDelete as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategoryItem = SubCategoryItem::select('id')->whereIn('sub_category_id',$SubCategory)->get();

        $SubCategoryItemImages = SubCategoryItemImages::whereIn('sub_categories_items_id',$SubCategoryItem)->get();

        if($SubCategoryItemImages->isEmpty() === false)
        {
            foreach($SubCategoryItemImages as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategoryItem = SubCategoryItem::whereIn('sub_category_id',$SubCategory)->get();

        if($SubCategoryItem->isEmpty() === false)
        {
            foreach($SubCategoryItem as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategoryDelete = SubCategory::where('category_id',$Category->id)->get();

        if($SubCategoryDelete->isEmpty() === false)
        {
            foreach($SubCategoryDelete as $item)
            {
                $item->delete(); 
            }
        }

        $Category = Category::where('id',$id)->first();

        $Category->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully!');
    }

    //Sub Categories Function 
    public function sub_categories()
    {
        $Category = Category::get();
        $SubCategory = SubCategory::with('Category')->orderBy('id', 'desc')->get();
        return view("admin_panel.services.sub_category", compact('Category','SubCategory'));
    }

    public function create_sub_category(Request $request)
    {
        $SubCategory = SubCategory::create([
            'category_id' => $request->Category_name,
            'slug' => Str::slug($request->slug),
            'sub_category_name' => $request->sub_category_name,
        ]);

        return redirect()->back()->with('success', 'Sub Category Create Successfully!');
    }

    public function edit_sub_category(Request $request)
    {

        $SubCategory = SubCategory::where('id',$request->id)->update([
            'category_id' => $request->edit_Category_name,
            'slug' => Str::slug($request->slug),
            'sub_category_name' => $request->edit_sub_category_name,
        ]);

        return redirect()->back()->with('success', 'Sub Category Update Successfully!');
    }

    public function delete_sub_category($id)
    {
        $SubCategory = SubCategory::select('id')->where('id',$id)->first();

        $ServiceDetail = ServiceDetail::select('id')->whereIn('sub_category',$SubCategory)->get();

        $ServiceDetailProcess = ServiceDetailProcess::whereIn('service_detail_id',$ServiceDetail)->get();

        if($ServiceDetailProcess->isEmpty() === false)
        {
            foreach($ServiceDetailProcess as $item)
            {
                $item->delete(); 
            }
        }
        
        $ServiceDetailDelete = ServiceDetail::whereIn('sub_category',$SubCategory)->get();
        
        if($ServiceDetailDelete->isEmpty() === false)
        {
            foreach($ServiceDetailDelete as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategoryItem = SubCategoryItem::select('id')->whereIn('sub_category_id',$SubCategory)->get();

        $SubCategoryItemImages = SubCategoryItemImages::whereIn('sub_categories_items_id',$SubCategoryItem)->get();

        if($SubCategoryItemImages->isEmpty() === false)
        {
            foreach($SubCategoryItemImages as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategoryItem = SubCategoryItem::whereIn('sub_category_id',$SubCategory)->get();

        if($SubCategoryItem->isEmpty() === false)
        {
            foreach($SubCategoryItem as $item)
            {
                $item->delete(); 
            }
        }

        $SubCategory = SubCategory::where('id',$id)->first();

        $delete_SubCategory = $SubCategory->delete();
        
        return redirect()->back()->with('message', 'Sub Category Deleted Successfully!');
    }

    //Sub Categories Item Function
    public function sub_categories_item()
    {
        $SubCategory = SubCategory::get();
        $SubCategoryItem = SubCategoryItem::with('SubCategory','SubCategoryItemImages')->get();
        // dd($SubCategoryItem);
        return view("admin_panel.services.sub_category_item",compact('SubCategory','SubCategoryItem'));
    }

    public function create_sub_category_item(Request $request)
    {
        $SubCategoryItem = SubCategoryItem::create([
            'sub_category_id' => $request->sub_Category_name,
            'item_name' => $request->item_name,
        ]);

        if ($request->hasFile('picture')) 
        {
            foreach ($request->file('picture') as $image) 
            {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('sub_category_item_images'), $imageName);

                $SubCategoryItemImages = SubCategoryItemImages::create([
                    'sub_categories_items_id' => $SubCategoryItem->id,
                    'images' => 'sub_category_item_images/'.$imageName,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Sub Category Item Created Successfully!');
    }

    public function get_images_on_edit_work(Request $request)
    {
        $SubCategoryItemImages = SubCategoryItemImages::where('sub_categories_items_id',$request->id)->get();

        $html = '';

        $url = "delete_work_image";
        foreach($SubCategoryItemImages as $item)
        {
            $html .= '<div class="edit_image_on_work">';
            $html .= '<img src="'.asset($item->images).'" width="50%">';
            $html .= '<a style="margin-right: 20px" href="'.$url.'/'.$item->id.'" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"> <span> Delete</span></i></a>';
            $html .= '</div>';
         }
        return $html;
    }

    public function delete_work_image($id)
    {
        $SubCategoryItemImages = SubCategoryItemImages::where('id',$id)->first();
        $delete_SubCategoryItemImages = $SubCategoryItemImages->delete();

        return redirect()->back()->with('message', 'Image Deleted Successfully!');
    }

    public function edit_sub_category_work(Request $request)
    {
        $data = array();

        if($request->edit_item_name)
        {
            $data['item_name'] = $request->edit_item_name;
        }
        if($request->edit_sub_Category_name)
        {
            $data['sub_category_id'] = $request->edit_sub_Category_name;
        }

        $SubCategoryItem = SubCategoryItem::where('id',$request->id)->update($data);

        if ($request->hasFile('edit_picture')) 
        {
            foreach ($request->file('edit_picture') as $image) 
            {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('sub_category_item_images'), $imageName);

                $SubCategoryItemImages = SubCategoryItemImages::create([
                    'sub_categories_items_id' => $request->id,
                    'images' => 'sub_category_item_images/'.$imageName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Work Edit Successfully!');
    }

    public function delete_sub_category_item($id)
    {
        $SubCategoryItem = SubCategoryItem::where('id',$id)->first();

        $SubCategoryItemImages = SubCategoryItemImages::where('sub_categories_items_id',$SubCategoryItem->id)->get();

        foreach($SubCategoryItemImages as $item)
        {
            $item->delete();
        }

        $SubCategoryItem->delete();

        return redirect()->back()->with('message', 'Work Deleted Successfully!');
    }

    //Service Detail Function
    public function service_details()
    {
        $ServiceDetail = ServiceDetail::with('SubCategory')->get();
        $ServiceDetailId = ServiceDetail::select('sub_category')->get();
        $SubCategory = SubCategory::whereNotIn('id', $ServiceDetailId)->get();

        return view("admin_panel.services.service_detail.list", compact('ServiceDetail','SubCategory'));
    }

    public function add_service_detail()
    {
        $ServiceDetail = ServiceDetail::select('sub_category')->get();
        $SubCategory = SubCategory::whereNotIn('id', $ServiceDetail)->get();
        return view("admin_panel.services.service_detail.create",compact('SubCategory'));
    }

    public function create_service_detail(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'sub_category' => 'required',
            'banner_heading' => 'required',
            'banner_content' => 'required',
            'row_number' => 'required',
            'process_paragraph' => 'required',
            'process_heading' => 'required|array|min:1',
            'process_content' => 'required|array|min:1',
            'about_content' => 'required|string|min:25',
            'banner_image_service_detail' => 'required',
            'first_banner_image' => 'required',
            'info_banner_heading' => 'required',
            'info_banner_content' => 'required',
            'info_banner_image' => 'required',
            'info_banner_button_link' => 'required',
            'second_banner' => 'required',
            'testimonial_heading_1' => 'required',
            'testimonial_heading_2' => 'required',
            'testimonial_heading_3' => 'required',
            'testimonial_heading_4' => 'required',
            'testimonial_name_1' => 'required',
            'testimonial_name_2' => 'required',
            'testimonial_name_3' => 'required',
            'testimonial_name_4' => 'required',
            'testimonial_designation_1' => 'required',
            'testimonial_designation_2' => 'required',
            'testimonial_designation_3' => 'required',
            'testimonial_designation_4' => 'required',
            'testimonial_content_1' => 'required',
            'testimonial_content_2' => 'required',
            'testimonial_content_3' => 'required',
            'testimonial_content_4' => 'required',
            'testimonial_image_1' => 'required',
            'testimonial_image_2' => 'required',
            'testimonial_image_3' => 'required',
            'testimonial_image_4' => 'required',
        ]);

        $ServiceDetail = array();

        if($request->meta_title)
        {
            $ServiceDetail['meta_title'] = $request->meta_title;
        }
        if($request->meta_keyword)
        {
            $ServiceDetail['meta_keyword'] = implode(',',$request->meta_keyword);
        }
        if($request->meta_description)
        {
            $ServiceDetail['meta_description'] = $request->meta_description;
        }
        if($request->sub_category)
        {
            $ServiceDetail['sub_category'] = $request->sub_category; 
        }
        if($request->second_banner)
        {
            $ServiceDetail['second_banner'] = $request->second_banner; 
        }
        if($request->banner_heading)
        {
            $ServiceDetail['banner_heading'] = $request->banner_heading; 
        }
        if($request->banner_content)
        {
            $ServiceDetail['banner_content'] = $request->banner_content; 
        }
        if($request->first_banner_image)
        {
            $ServiceDetail['first_banner_image'] = $this->singleImage($request->first_banner_image, 'ServiceDetail'); 
        }
        if($request->process_paragraph)
        {
            $ServiceDetail['process_content'] = $request->process_paragraph; 
        }
        if($request->info_banner_heading)
        {
            $ServiceDetail['info_banner_heading'] = $request->info_banner_heading; 
        }
        if($request->info_banner_content)
        {
            $ServiceDetail['info_banner_content'] = $request->info_banner_content; 
        }
        if($request->info_banner_image)
        {
            $ServiceDetail['info_banner_image'] = $this->singleImage($request->info_banner_image, 'ServiceDetail'); 
        }
        if($request->info_banner_button_link)
        {
            $ServiceDetail['info_banner_button_link'] = $request->info_banner_button_link; 
        }
        if($request->about_content)
        {
            $ServiceDetail['about_content'] = $request->about_content; 
        }
        if($request->banner_image_service_detail)
        {
            $ServiceDetail['banner_image_service_detail'] = $this->singleImage($request->banner_image_service_detail, 'ServiceDetail'); 
        }

        $ServiceDetail = ServiceDetail::create($ServiceDetail);

        $ServiceDetailTestimonails = array();

        if($ServiceDetail->id)
        {
            $ServiceDetailTestimonails['service_id'] = $ServiceDetail->id;
        }
        if($request->testimonial_heading_1)
        {
            $ServiceDetailTestimonails['testimonial_heading_1'] = $request->testimonial_heading_1;
        }
        if($request->testimonial_heading_2)
        {
            $ServiceDetailTestimonails['testimonial_heading_2'] = $request->testimonial_heading_2;
        }
        if($request->testimonial_heading_3)
        {
            $ServiceDetailTestimonails['testimonial_heading_3'] = $request->testimonial_heading_3;
        }
        if($request->testimonial_heading_4)
        {
            $ServiceDetailTestimonails['testimonial_heading_4'] = $request->testimonial_heading_4;
        }
        if($request->testimonial_name_1)
        {
            $ServiceDetailTestimonails['testimonial_name_1'] = $request->testimonial_name_1;
        }
        if($request->testimonial_name_2)
        {
            $ServiceDetailTestimonails['testimonial_name_2'] = $request->testimonial_name_2;
        }
        if($request->testimonial_name_3)
        {
            $ServiceDetailTestimonails['testimonial_name_3'] = $request->testimonial_name_3;
        }
        if($request->testimonial_name_4)
        {
            $ServiceDetailTestimonails['testimonial_name_4'] = $request->testimonial_name_4;
        }
        if($request->testimonial_designation_1)
        {
            $ServiceDetailTestimonails['testimonial_designation_1'] = $request->testimonial_designation_1;
        }
        if($request->testimonial_designation_2)
        {
            $ServiceDetailTestimonails['testimonial_designation_2'] = $request->testimonial_designation_2;
        }
        if($request->testimonial_designation_3)
        {
            $ServiceDetailTestimonails['testimonial_designation_3'] = $request->testimonial_designation_3;
        }
        if($request->testimonial_designation_4)
        {
            $ServiceDetailTestimonails['testimonial_designation_4'] = $request->testimonial_designation_4;
        }
        if($request->testimonial_content_1)
        {
            $ServiceDetailTestimonails['testimonial_content_1'] = $request->testimonial_content_1;
        }
        if($request->testimonial_content_2)
        {
            $ServiceDetailTestimonails['testimonial_content_2'] = $request->testimonial_content_2;
        }
        if($request->testimonial_content_3)
        {
            $ServiceDetailTestimonails['testimonial_content_3'] = $request->testimonial_content_3;
        }
        if($request->testimonial_content_4)
        {
            $ServiceDetailTestimonails['testimonial_content_4'] = $request->testimonial_content_4;
        }
        if($request->testimonial_image_1)
        {
            $ServiceDetailTestimonails['testimonial_image_1'] = $this->singleImage($request->testimonial_image_1, 'ServiceDetail');
        }
        if($request->testimonial_image_2)
        {
            $ServiceDetailTestimonails['testimonial_image_2'] = $this->singleImage($request->testimonial_image_2, 'ServiceDetail');
        }
        if($request->testimonial_image_3)
        {
            $ServiceDetailTestimonails['testimonial_image_3'] = $this->singleImage($request->testimonial_image_3, 'ServiceDetail');
        }
        if($request->testimonial_image_4)
        {
            $ServiceDetailTestimonails['testimonial_image_4'] = $this->singleImage($request->testimonial_image_4, 'ServiceDetail');
        }
        
        $ServiceTestimonial = ServiceTestimonial::create($ServiceDetailTestimonails);

        $process_heading = $request->process_heading;
        $process_content = $request->process_content;

        for($i = 0; $i < count($process_heading); $i++)
        {
            $ServiceDetailProcess = ServiceDetailProcess::create([
                'image' => $this->singleImage($request->process_image[$i], 'ServiceDetail'),
                'service_detail_id' => $ServiceDetail->id,
                'heading' => $process_heading[$i],
                'content' => $process_content[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Servies Details Create Successfully!');
    }

    public function edit_service_detail(Request $request)
    {
        $EditServiceDetail = ServiceDetail::with('SubCategory','ServiceDetailProcess','ServiceDetailTestimonails')->where('id',$request->id)->first();
        
        $all_selected_sub_category = ServiceDetail::select('sub_category')->where('sub_category','!=',$EditServiceDetail->sub_category)->get();

        $SubCategory = SubCategory::whereNotIn('id', $all_selected_sub_category)->get();

        $explode_meta_keyword = explode(',',$EditServiceDetail->meta_keyword);

        return view('admin_panel.services.service_detail.edit',compact('SubCategory','EditServiceDetail', 'explode_meta_keyword'));
    }

    public function update_service_details(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'sub_category' => 'required',
            'banner_heading' => 'required',
            'banner_content' => 'required',
            'row_number' => 'required',
            'process_paragraph' => 'required',
            'process_heading' => 'required|array|min:1',
            'process_content' => 'required|array|min:1',
            'about_content' => 'required|string|min:25',
            'info_banner_heading' => 'required',
            'info_banner_content' => 'required',
            'info_banner_button_link' => 'required',
            'testimonial_heading_1' => 'required',
            'testimonial_heading_2' => 'required',
            'testimonial_heading_3' => 'required',
            'testimonial_heading_4' => 'required',
            'testimonial_name_1' => 'required',
            'testimonial_name_2' => 'required',
            'testimonial_name_3' => 'required',
            'testimonial_name_4' => 'required',
            'testimonial_designation_1' => 'required',
            'testimonial_designation_2' => 'required',
            'testimonial_designation_3' => 'required',
            'testimonial_designation_4' => 'required',
            'testimonial_content_1' => 'required',
            'testimonial_content_2' => 'required',
            'testimonial_content_3' => 'required',
            'testimonial_content_4' => 'required',
        ]);

        $ServiceDetail = array();

        if($request->meta_title)
        {
            $ServiceDetail['meta_title'] = $request->meta_title;
        }
        if($request->meta_keyword)
        {
            $ServiceDetail['meta_keyword'] = implode(',',$request->meta_keyword);
        }
        if($request->meta_description)
        {
            $ServiceDetail['meta_description'] = $request->meta_description;
        }
        if($request->sub_category)
        {
            $ServiceDetail['sub_category'] = $request->sub_category; 
        }
        if($request->second_banner)
        {
            $ServiceDetail['second_banner'] = $request->second_banner; 
        }
        if($request->banner_heading)
        {
            $ServiceDetail['banner_heading'] = $request->banner_heading; 
        }
        if($request->banner_content)
        {
            $ServiceDetail['banner_content'] = $request->banner_content; 
        }
        if($request->first_banner_image)
        {
            $ServiceDetail['first_banner_image'] = $this->singleImage($request->first_banner_image, 'ServiceDetail'); 
        }
        
        if($request->process_paragraph)
        {
            $ServiceDetail['process_content'] = $request->process_paragraph; 
        }

        if($request->info_banner_heading)
        {
            $ServiceDetail['info_banner_heading'] = $request->info_banner_heading; 
        }
        if($request->info_banner_content)
        {
            $ServiceDetail['info_banner_content'] = $request->info_banner_content; 
        }
        if($request->info_banner_image)
        {
            $ServiceDetail['info_banner_image'] = $this->singleImage($request->info_banner_image, 'ServiceDetail'); 
        }
        if($request->info_banner_button_link)
        {
            $ServiceDetail['info_banner_button_link'] = $request->info_banner_button_link; 
        }
        if($request->about_content)
        {
            $ServiceDetail['about_content'] = $request->about_content; 
        }
        if($request->banner_image_service_detail)
        {
            $ServiceDetail['banner_image_service_detail'] = $this->singleImage($request->banner_image_service_detail, 'ServiceDetail'); 
        }
        $ServiceDetailTestimonails = array();

        if($request->testimonial_heading_1)
        {
            $ServiceDetailTestimonails['testimonial_heading_1'] = $request->testimonial_heading_1;
        }
        if($request->testimonial_heading_2)
        {
            $ServiceDetailTestimonails['testimonial_heading_2'] = $request->testimonial_heading_2;
        }
        if($request->testimonial_heading_3)
        {
            $ServiceDetailTestimonails['testimonial_heading_3'] = $request->testimonial_heading_3;
        }
        if($request->testimonial_heading_4)
        {
            $ServiceDetailTestimonails['testimonial_heading_4'] = $request->testimonial_heading_4;
        }
        if($request->testimonial_name_1)
        {
            $ServiceDetailTestimonails['testimonial_name_1'] = $request->testimonial_name_1;
        }
        if($request->testimonial_name_2)
        {
            $ServiceDetailTestimonails['testimonial_name_2'] = $request->testimonial_name_2;
        }
        if($request->testimonial_name_3)
        {
            $ServiceDetailTestimonails['testimonial_name_3'] = $request->testimonial_name_3;
        }
        if($request->testimonial_name_4)
        {
            $ServiceDetailTestimonails['testimonial_name_4'] = $request->testimonial_name_4;
        }
        if($request->testimonial_designation_1)
        {
            $ServiceDetailTestimonails['testimonial_designation_1'] = $request->testimonial_designation_1;
        }
        if($request->testimonial_designation_2)
        {
            $ServiceDetailTestimonails['testimonial_designation_2'] = $request->testimonial_designation_2;
        }
        if($request->testimonial_designation_3)
        {
            $ServiceDetailTestimonails['testimonial_designation_3'] = $request->testimonial_designation_3;
        }
        if($request->testimonial_designation_4)
        {
            $ServiceDetailTestimonails['testimonial_designation_4'] = $request->testimonial_designation_4;
        }
        if($request->testimonial_content_1)
        {
            $ServiceDetailTestimonails['testimonial_content_1'] = $request->testimonial_content_1;
        }
        if($request->testimonial_content_2)
        {
            $ServiceDetailTestimonails['testimonial_content_2'] = $request->testimonial_content_2;
        }
        if($request->testimonial_content_3)
        {
            $ServiceDetailTestimonails['testimonial_content_3'] = $request->testimonial_content_3;
        }
        if($request->testimonial_content_4)
        {
            $ServiceDetailTestimonails['testimonial_content_4'] = $request->testimonial_content_4;
        }
        if($request->testimonial_image_1)
        {
            $ServiceDetailTestimonails['testimonial_image_1'] = $this->singleImage($request->testimonial_image_1, 'ServiceDetail');
        }
        if($request->testimonial_image_2)
        {
            $ServiceDetailTestimonails['testimonial_image_2'] = $this->singleImage($request->testimonial_image_2, 'ServiceDetail');
        }
        if($request->testimonial_image_3)
        {
            $ServiceDetailTestimonails['testimonial_image_3'] = $this->singleImage($request->testimonial_image_3, 'ServiceDetail');
        }
        if($request->testimonial_image_4)
        {
            $ServiceDetailTestimonails['testimonial_image_4'] = $this->singleImage($request->testimonial_image_4, 'ServiceDetail');
        }

        $ServiceDetail = ServiceDetail::where('id',$request->id)->update($ServiceDetail);

        $ServiceTestimonial = ServiceTestimonial::where('service_id',$request->id)->update($ServiceDetailTestimonails);

        $process_id = $request->process_id;
        $process_heading = $request->process_heading;
        $process_content = $request->process_content;
        $process_image = $request->process_image;

        for($i = 0; $i < count($process_heading); $i++)
        {
            $ServiceDetailProcessData = [
                'service_detail_id' => $request->id,
                'heading' => $process_heading[$i],
                'content' => $process_content[$i],
            ];

            if (isset($process_image[$i]) && isset($process_id[$i])) 
            {
                $ServiceDetailProcessData['image'] = $this->singleImage($request->process_image[$i], 'ServiceDetail');

                $ServiceDetailProcess = ServiceDetailProcess::where('service_detail_id',$request->id)->where('id',$process_id[$i])->update($ServiceDetailProcessData);
            }
            if(isset($process_image[$i]) && isset($process_heading[$i]) && isset($process_content[$i]) && !isset($process_id[$i]))
            {
                $ServiceDetailProcessData['image'] = $this->singleImage($request->process_image[$i], 'ServiceDetail');
    
                $ServiceDetailProcess = ServiceDetailProcess::create($ServiceDetailProcessData);
            }
            if(isset($process_id[$i]))
            {    
                $ServiceDetailProcess = ServiceDetailProcess::where('service_detail_id',$request->id)->where('id',$process_id[$i])->update($ServiceDetailProcessData);
            }
        }
        
        return redirect()->back()->with('success', 'Servies Details Updated Successfully!');
    }

    public function delete_service_detail($id)
    {        
        $ServiceDetailProcess = ServiceDetailProcess::where('service_detail_id',$id)->get();

        foreach($ServiceDetailProcess as $item)
        {
            $item->delete();
        }

        $ServiceDetail = ServiceDetail::where('id',$id)->first();

        $ServiceDetail->delete();

        return redirect()->back()->with('message', 'Servies Details Deleted Successfully!');
        
    }
 
    public function delete_specific_process(Request $request)
    {
        $ServiceDetailProcess = ServiceDetailProcess::where('id',$request->id)->first();

        $ServiceDetailProcess->delete();

        return response()->json(['status' => 'success']);
    }
}
