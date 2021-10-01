<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Task;
use App\Models\Course;
use App\Models\TaskUser;
use App\Mail\Assignament;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Models\CompetenceUser;
use App\Http\Livewire\TasksUser;
use App\Models\User;
use App\Notifications\TasksCompleted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

        foreach ($courses as $course) {
            if ($course->image) {
                $course->image->url = $this->getS3URL('courses', $course->id);
            }
        }

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
        return $course;
        $tasks = $course->tasks;
        $user = auth()->user()->id;
        return view('profile.courses.tasks', compact('tasks', 'course'));
    }

    public function task(Task $task)
    {
        $course = $task->course;
        if ($course->students->contains('id', auth()->user()->id)) {
            $taskUser = TaskUser::whereUserId(auth()->user()->id)
                ->whereTaskId($task->id)->first();
            return view('profile.courses.task', compact('task', 'course', 'taskUser'));
        } else {
            return redirect()->route('home');
        }
    }

    public function resources(Competence $competence)
    {
        $resource = CompetenceUser::whereCompetenceId($competence->id)
            ->firstWhere('user_id', auth()->user()->id);

        return $resource;
        return view('profile.competences.resources', compact('resource'));
    }


    public function competenceImage(Request $request, CompetenceUser $resource)
    {
        if ($request->hasfile('image')) {
            $url = Storage::disk('public')->put('competences/resources', $request->file('image'));
            $resource->images()->create([
                'url' => $url
            ]);
        }
        return back();
    }

    public function courseImage(Request $request, Task $task)
    {
        $user = auth()->user();
        if (!$task->students->contains($user->id)) {
            $task->students()->attach($user->id);
        }

        $taskUser = TaskUser::whereTaskId($task->id)
            ->firstWhere('user_id', $user->id);

        if ($request->hasfile('image')) {
            $url = Storage::disk('public')->put('course/tasks', $request->file('image'));
            $taskUser->images()->create([
                'url' => $url
            ]);
        }

        if ($task->quantity == $taskUser->images_count + 1) {
            $taskUser->complete = true;
            $taskUser->save();
            event(new UserNotification($user, $task));
        }


        return back();
    }
}
