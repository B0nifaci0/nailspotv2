<?php

namespace App\Http\Controllers\Instructor;

use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use App\Models\Platform;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Mail\CourseCreated;
use App\Models\Contact;
use App\Models\Seo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    public $admin;
    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
        $this->admin=Contact::all();
    }

    public function index()
    {
        return view('instructor.courses.index');
    }

    public function create()
    {
        $levels = Level::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $platforms = Platform::pluck('name', 'id');
        return view('instructor.courses.create', compact('categories', 'levels', 'platforms'));
    }

    public function store(CourseRequest $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $course = Course::create($request->all());
        Seo::create([
            'modelable_type'=>str_replace('\\', '/', get_class($course)),
            'modelable_id'=>$course->id,
            'title'=>$request->get('title'),
            'seodescription'=>$request->get('seodescription'),
            'keywords'=>$request->get('keywords'),
        ]);

        if ($request->hasfile('image')) {
            $url = Storage::disk('public')->put('courses', $request->file('image'));
            $course->image()->create([
                'url' => $url
            ]);
        }

        if ($request->hasfile('pdf')) {
            $url = Storage::disk('public')->put('certificates', $request->file('pdf'));
            $course->certificate()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit', $course)->with('info', 'El curso se creo con exito!');
    }

    public function edit(Course $course)
    {
        $this->authorize('dicatated', $course);
        $levels = Level::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $platforms = Platform::pluck('name', 'id');
        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'platforms'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('dicatated', $course);
        if ($request->platform_id == 1) {
            $request->validate([
                'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            ]);
        } else {

            $request->validate([
                'url' => ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/']
            ]);
        }

        $course->update($request->all());
        if(!$course->seo){
            Seo::create([
                'modelable_type'=>str_replace('\\', '/', get_class($course)),
                'modelable_id'=>$course->id,
                'title'=>$request->get('title'),
                'seodescription'=>$request->get('seodescription'),
                'keywords'=>$request->get('keywords'),
            ]);
        }else{
            $course->seo->update($request->all());
        }
        if ($request->hasfile('image')) {
            $url = Storage::disk('public')->put('courses', $request->file('image'));
            if ($course->image) {
                Storage::delete($course->image->url);
                $course->image()->update([
                    'url' => $url
                ]);
            } else {
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->hasfile('pdf')) {
            $url = Storage::disk('public')->put('certificates', $request->file('pdf'));
            if ($course->certificate) {
                Storage::delete($course->certificate->url);
                $course->certificate()->update([
                    'url' => $url
                ]);
            } else {
                $course->certificate()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('instructor.courses.edit', $course)->with('info', 'El curso se actualizo con exito!');
    }

    public function studentTasks(Course $course, User $student)
    {
        $this->authorize('dicatated', $course);

        return view('instructor.courses.student.tasks', compact('student', 'course'));
    }

    public function goals(Course $course)
    {
        $this->authorize('dicatated', $course);
        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $Admins=User::whereHas('roles', function($query){
            return $query->where('name', '=', 'Admin');
        })->get();
        $course->status = Course::REVISION;
        $course->save();
        $user=auth()->user();
        $courseStatus=new CourseCreated($course, $user);    
        foreach ($Admins as $key => $admin) {
            Mail::to($admin->email)->queue($courseStatus);
        }
        return back();
    }

    public function comments(Course $course)
    {
        return view('instructor.courses.comments', compact('course'));
    }


    public function tasks(Course $course)
    {
        $this->authorize('dicatated', $course);
        return view('instructor.courses.tasks', compact('course'));
    }
}
