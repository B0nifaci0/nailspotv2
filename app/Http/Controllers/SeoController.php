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
            'image'=>$request->get('image'),
            'type'=>$request->get('type'),
            'video_thumbnail'=>$request->get('video_thumbnail'),
            'video_description'=>$request->get('video_description'),
            'video_url'=>$request->get('video_url'),
            'video_expiration'=>$request->get('video_expiration')
        ]);
        return redirect()->back()->with('info', '¡El Seo se creo con exito!');;
    }
    public function update(Seo $seo, Request $request){
        
        $seo->update($request->all());
        return redirect()->back()->with('info', '¡El Seo se actualizo con exito!');;
    }
}
