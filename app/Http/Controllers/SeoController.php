<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function store(Course $course ,Request $request){
        Seo::create([
            'modelable_type'=>str_replace('\\', '/', get_class($course)),
            'modelable_id'=>$course->id,
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'keywords'=>$request->get('keywords'),
            'video_thumbnail'=>$request->get('video_thumbnail'),
        ]);
        return redirect()->back()->with('info', '¡El Seo se creo con exito!');;
    }
    public function update(Seo $seo, Request $request){
        $seo->update($request->all());
        return redirect()->back()->with('info', '¡El Seo se actualizo con exito!');;
    }
}
