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

class ServicesController extends Controller
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
        $Category = Category::with('SubCategory')->where('id',$id)->first();

        if($Category->SubCategory->isEmpty() === false)
        {
            foreach($Category->SubCategory as $item)
            {
                $item->delete();
            }
        }

        $delete_category = $Category->delete();

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
            'sub_category_name' => $request->sub_category_name,
        ]);

        return redirect()->back()->with('success', 'Sub Category Create Successfully!');
    }

    public function edit_sub_category(Request $request)
    {

        $SubCategory = SubCategory::where('id',$request->id)->update([
            'category_id' => $request->edit_Category_name,
            'sub_category_name' => $request->edit_sub_category_name,
        ]);

        return redirect()->back()->with('success', 'Sub Category Update Successfully!');
    }

    public function delete_sub_category($id)
    {
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
            $html .= '<img src="'.$item->images.'" width="50%">';
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
        return view("admin_panel.services.service_detail.list", compact('ServiceDetail'));
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
            'sub_category' => 'required',
            'banner_heading' => 'required',
            'banner_content' => 'required',
            'row_number' => 'required',
            'process_heading' => 'required|array|min:1',
            'process_content' => 'required|array|min:1',
            'about_content' => 'required|string|min:25',
            'banner_image_service_detail' => 'required',
        ]);

        $ServiceDetail = array();

        if($request->sub_category)
        {
            $ServiceDetail['sub_category'] = $request->sub_category; 
        }
        if($request->banner_heading)
        {
            $ServiceDetail['banner_heading'] = $request->banner_heading; 
        }
        if($request->banner_content)
        {
            $ServiceDetail['banner_content'] = $request->banner_content; 
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

        $process_heading = $request->process_heading;
        $process_content = $request->process_content;

        for($i = 0; $i < count($process_heading); $i++)
        {
            $ServiceDetailProcess = ServiceDetailProcess::create([
                'service_detail_id' => $ServiceDetail->id,
                'heading' => $process_heading[$i],
                'content' => $process_content[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Servies Details Create Successfully!');
    }
}
