<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogController extends Controller
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

    public function index()
    {
        $Category = Category::get();
        $Blog = Blog::with('Category')->get();
        return view('admin_panel.blogs.list', compact('Category','Blog'));
    }

    public function create()
    {
        $Category = Category::get();
        return view('admin_panel.blogs.create', compact('Category'));
    }

    public function create_blog_db(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|max:30',
            'blog_Category' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'blog_name' => 'required',
            'blog_short_description' => 'required',
            'blog_description' => 'required',
            'status' => 'required',
            'blog_images' => 'required',
            'blog_image_thumb' => 'required',
        ]);

        $data = array();

        if($request->slug)
        {
            $data['slug'] = Str::slug($request->slug);
        }
        if($request->blog_Category)
        {
            $data['category'] = $request->blog_Category;
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
        if($request->blog_name)
        {
            $data['blog_name'] = $request->blog_name;
        }
        if($request->blog_short_description)
        {
            $data['blog_short_description'] = $request->blog_short_description;
        }
        if($request->blog_description)
        {
            $data['blog_description'] = $request->blog_description;
        }
        if($request->status)
        {
            $data['status'] = $request->status;
        }
        if($request->blog_images)
        {
            $data['blog_image'] = $this->singleImage($request->blog_images, 'blogsImages');
        }
        if($request->blog_image_thumb)
        {
            $data['blog_image_thumb'] = $this->singleImage($request->blog_image_thumb, 'blogsImages');
        }

        $Blog = Blog::create($data);

        return redirect()->back()->with('success', 'Created Successfully!');
    }

    public function edit_blog($id)
    {
        $Blog = Blog::where('id',$id)->first();
        $keywordList = explode(',', $Blog->meta_keyword);
        // $keywordList = $Blog->meta_keyword;
        // dd($keywordList);
        $Category = Category::get();
        return view('admin_panel.blogs.edit', compact('Category','Blog','keywordList'));
    }

    public function update(Request $request)
    {
        $data = array();

        if($request->slug)
        {
            $data['slug'] = Str::slug($request->slug);
        }
        if($request->blog_Category)
        {
            $data['category'] = $request->blog_Category;
        }
        if($request->edit_meta_title)
        {
            $data['meta_title'] = $request->edit_meta_title;
        }
        if($request->edit_meta_keyword)
        {
            $data['meta_keyword'] = implode(',',$request->edit_meta_keyword);
        }
        if($request->edit_meta_description)
        {
            $data['meta_description'] = $request->edit_meta_description;
        }
        if($request->edit_blog_name)
        {
            $data['blog_name'] = $request->edit_blog_name;
        }
        if($request->edit_blog_short_description)
        {
            $data['blog_short_description'] = $request->edit_blog_short_description;
        }
        if($request->edit_blog_description)
        {
            $data['blog_description'] = $request->edit_blog_description;
        }
        if($request->edit_status)
        {
            $data['status'] = $request->edit_status;
        }
        if($request->edit_blog_images)
        {
            $data['blog_image'] = $this->singleImage($request->edit_blog_images, 'blogsImages');
        }
        if($request->edit_blog_image_thumb)
        {
            $data['blog_image_thumb'] = $this->singleImage($request->edit_blog_image_thumb, 'blogsImages');
        }

        $Blog = Blog::where('id',$request->id)->update($data);

        return redirect()->back()->with('success', 'Update Successfully Successfully!');
    }

    public function delete_blog($id)
    {
        $Blog = Blog::where('id',$id)->first();
        $Blog->delete();

        return redirect()->back()->with('message', 'Blog Deleted Successfully!');
    }
}
