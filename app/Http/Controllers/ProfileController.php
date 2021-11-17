<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Task;
use App\Models\User;
use App\Models\Course;
use App\Models\TaskUser;
use App\Mail\Assignament;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Models\CompetenceUser;
use App\Events\UserNotification;
use App\Http\Livewire\TasksUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TasksCompleted;
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
        $user = auth()->user();
        $coursesAdquiried = Sale::whereUserId($user->id)->whereSaleableType(Course::class)->with('saleable')->paginate(8);

        foreach ($coursesAdquiried as $sale) {
            if ($sale->saleable->image) {
                $sale->saleable->image->url = $this->getS3URL('courses', $sale->saleable->id);
            }
        }

        return view('profile.courses.index', compact('coursesAdquiried'));
    }

    public function competences()
    {
        $user = auth()->user();
        $competencesAdquiried = Sale::whereUserId($user->id)->whereSaleableType(Competence::class)->with('saleable')->paginate(8);

        foreach ($competencesAdquiried as $sale) {
            if ($sale->saleable->image) {
                $sale->saleable->image->url = $this->getS3URL('competences', $sale->saleable->id);
            }
        }

        return view('profile.competences.index', compact('competencesAdquiried'));
    }

    public function tasks(Course $course)
    {
        $this->authorize('enrolled', $course);
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

        $this->authorize('enrolled', $competence);
        $resource = CompetenceUser::whereCompetenceId($competence->id)
            ->firstWhere('user_id', auth()->user()->id);

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
        $finallyTask = false;
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
            $finallyTask = true;
        }

        if ($finallyTask) {
            return back()->with('success', '!La tarea se envió con exito!');
        } else {
            return back();
        }
    }
}
