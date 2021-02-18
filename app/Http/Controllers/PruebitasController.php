<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course;
use App\Models\Lesson;

class PruebitasController extends Controller
{
    public $contador = 0;
    public function index()
    {
        // $lesson = Lesson::has('users')
        //     ->whereId(173)
        //     ->with('users:id')
        //     ->get()
        //     ->pluck('users')
        //     ->collapse();

        // foreach ($lesson as $item) {
        //     if ($item->pivot->status == 1) {
        //         $this->contador++;
        //     }
        // }
        // return $this->contador;


        $lesson = Course::lessons(121)
            ->with('tasks')
            ->get()
            ->pluck('tasks')
            ->collapse()
            ->where('status', Task::ENTREGADA)
            ->count();


        // $lesson = Lesson::whereId(121)->with('tasks')
        //     ->get()
        //     ->pluck('tasks');
        // dd($lesson);
        // return $lesson;
        return view('pruebitas', compact('courses'));
    }
}
