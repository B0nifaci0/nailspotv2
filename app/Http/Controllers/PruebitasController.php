<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Http\Request;

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

        $lesson = Lesson::whereId(121)
            ->with('tasks')
            ->get()
            ->pluck('tasks')
            ->collapse()
            ->where('status', Task::ENTREGADA)
            ->count();


        return $lesson;
        return view('pruebitas', compact('courses'));
    }
}
