<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return response()->view('pages.sitemap_index')->header('Content-Type', 'text/xml');
    }
    public function courses(){
        $courses=Course::whereStatus(3)->latest('id')->get();
        return response()->view('pages.courses-sitemap', compact('courses'))->header('Content-Type', 'text/xml');
    }
    public function pages(){
        return response()->view('pages.pages-sitemap')->header('Content-Type', 'text/xml');
    }
    public function videos(){
        $courses=Course::whereStatus(3)->latest('id')->get();
        return response()->view('pages.videos-sitemap', compact('courses'))->header('Content-Type', 'text/xml');
    }
}
