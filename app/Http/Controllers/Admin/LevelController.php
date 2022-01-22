<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    public function create()
    {

        return view('admin.levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels'
        ]);

        $level = Level::create($request->all());
        return redirect()->route('admin.levels.index', $level)->with('info', 'El nivel se creo con exito!');
    }

    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id
        ]);
        $level->update($request->all());
        return redirect()->route('admin.levels.index', $level)->with('info', 'El nivel se actualizo con exito!');
    }

    public function destroy(Level $level)
    {
        if ($level->subcompetence_count > 0) {
            return redirect()->route('admin.levels.index')->with('warning', 'No se pude eliminar el nivel porque esta en uso!');
        }
        $level->delete();
        return redirect()->route('admin.levels.index')->with('info', 'El nivel se elimino con exito!');
    }
}
