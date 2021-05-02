<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Models\CompetenceUser;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    public function security(Request $request)
    {
        return view('profile.security', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function delete(Request $request)
    {
        return view('profile.delete', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function courses()
    {
        $courses = Course::whereHas('sales', function ($query) {
            $user = auth()->user();
            return $query->where('user_id', $user->id);
        })->with('sales', function ($query) {
            $user = auth()->user();
            return $query->where('user_id', $user->id);
        })->paginate(8);

        return view('profile.courses.index', compact('courses'));
    }

    public function competences()
    {
        $competences = Competence::whereHas('sales', function ($query) {
            $user = auth()->user();
            return $query->where('user_id', $user->id);
        })->with(
            'sales',
            function ($query) {
                $user = auth()->user();
                return $query->where('user_id', $user->id);
            }
        )->paginate(8);

        return view('profile.competences.index', compact('competences'));
    }

    public function tasks(Course $course)
    {
        $tasks = $course->tasks
            ->where('user_id', auth()->user()->id);

        return view('profile.courses.tasks', compact('tasks', 'course'));
    }

    public function task(Task $task)
    {
        $course = $task->lesson->course;
        return view('profile.courses.task', compact('task', 'course'));
    }

    public function resources(Competence $competence)
    {
        $resource = CompetenceUser::whereCompetenceId($competence->id)->whereUserId(auth()->user()->id)->first();
        return view('profile.competences.resources', compact('resource'));
    }

    public function image(Request $request, CompetenceUser $resource)
    {
        if ($request->hasfile('image')) {
            $url = Storage::put('public/competences/resources', $request->file('image'));
            $resource->images()->create([
                'url' => $url
            ]);
        }
        return back();
    }
}
