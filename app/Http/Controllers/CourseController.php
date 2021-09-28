<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;
use Laravel\Jetstream\Rules\Role;

class CourseController extends Controller
{

    public function index()
    {
        return view('courses.index');
    }

    public function show(Request $request, Course $course)
    {
        $data = array(
            '@context' => 'http://schema.org/',
            '@type' => 'Course',
            'name' => $course->name,
            'description' => strip_tags($course->description),
            'image' => $request->root() . '/storage/' . $course->image->url,
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'Nailspot',
                'brand' => 'Nailspot',
                'url' => $request->root(),
                'description' => 'Lleva tu conocimiento a otro nivel, con nuestro equipo de trabajo.',
                'logo' => array(
                    '@type' => 'ImageObject',
                    'height' => '264',
                    'name' => 'Logo de Nailspot',
                    'url' => $request->root() . '/img/nail.png',
                    'width' => '489'
                ),
                'sameAs' => array(
                    'https://www.instagram.com/nailspotoficial/',
                    'https://www.facebook.com/NailspotTuPuntoDeEncuentro/',
                    'https://www.youtube.com/channel/UCnRve8GiZBh7MA0kdYNG5iQ',
                    $request->root()
                ),
            ),
            'url' => $request->url(),
        );
        $data = str_replace('\\', '', json_encode($data, JSON_PRETTY_PRINT));
        $dataVideo = array(
            '@context' => 'https://schema.org/',
            '@type' => 'VideoObject',
            'name' => $course->name,
            'description' => strip_tags($course->description),
            'uploadDate' => $course->updated_at,
            'thumbnailUrl' => $request->root() . '/storage/' . $course->image->url,
            'contentUrl' => $course->url,
            'embedUrl' => $course->url
        );
        $dataVideo = str_replace('\\', '', json_encode($dataVideo, JSON_PRETTY_PRINT));
        $this->authorize('published', $course);
        $similares = Course::whereCategoryId($course->category_id)
            ->where('id', '!=', $course->id)
            ->whereStatus(3)
            ->inRandomOrder()
            ->take(5)
            ->get();

        foreach ($similares as $course) {
            if ($course->image) {
                $course->image->url = $this->getS3URL('courses', $course->id);
            }
        }
        return view('courses.show', compact('course', 'similares', 'data', 'dataVideo'));
    }

    #cursos gratuitos
    public function enrolled(Course $course, Request $request)
    {
        $course->students()->attach(auth()->user()->id);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $course->id,
            'saleable_type' => Course::class,
            'coupon_id' => $request->coupon_id,
            'final_price' => 0
        ]);
        return redirect()->route('course.status', $course);
    }
}
