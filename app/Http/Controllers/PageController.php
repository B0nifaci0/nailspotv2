<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(){
        $courses=Course::whereStatus(3)->latest('id')->get();
        return response()->view('pages.sitemap', compact('courses'))->header('Content-Type', 'text/xml');
    }
}
