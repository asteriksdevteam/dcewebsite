<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget($slug)
    {
        $Blog = Blog::where('slug',$slug)->first();
        
        return view('welcome', compact('Blog'));
    }
}
