<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
{
    public function index()
    {
        $criteria = Criterion::all();
        return view('admin.criteria.index', compact('criteria'));
    }

    public function create()
    {
        return view('admin.criteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:criteria'
        ]);

        Criterion::create($request->all());
        return redirect()->route('admin.criteria.index')->with('info', 'El criterio se creo con exito!');
    }

    public function edit(Criterion $criterion)
    {
        return view('admin.criteria.edit', compact('criterion'));
    }

    public function update(Request $request, Criterion $criterion)
    {
        $request->validate([
            'name' => 'required|unique:criteria,name,' . $criterion->id
        ]);
        $criterion->update($request->all());
        return redirect()->route('admin.criteria.index')->with('info', 'El criterio se actualizo con exito!');
    }

    public function destroy(Criterion $criterion)
    {
        $criterion->delete();
        return redirect()->route('admin.criteria.index')->with('info', 'El criterio se elimino con exito!');
    }
}
