<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Level;
use App\Models\Criterion;
use App\Models\Competence;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompetenceRequest;

class CompetenceController extends Controller
{

    public function index()
    {
        $competences = Competence::paginate(10);
        return view('admin.competences.index', compact('competences'));
    }

    public function create()
    {
        $levels = Level::pluck('name', 'id');
        $subcategories = Subcategory::pluck('name', 'id');
        $criteria = Criterion::all();
        return view('admin.competences.create', compact('levels', 'subcategories', 'criteria'));
    }

    public function store(CompetenceRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:competences'
        ]);

        $competence = Competence::create($request->all());
        $competence->criteria()->attach($request->criteria);

        if ($request->hasfile('image')) {
            $url = Storage::put('competences', $request->file('image'));
            $competence->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('admin.competences.index')->with('info', 'La competencia se creo con exito!');
    }

    public function edit(Competence $competence)
    {
        $levels = Level::pluck('name', 'id');
        $subcategories = Subcategory::pluck('name', 'id');
        $criteria = Criterion::all();
        return view('admin.competences.edit', compact('levels', 'subcategories', 'criteria', 'competence'));
    }

    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'name' => 'required|unique:competences,name,' . $competence->id
        ]);

        $competence->update($request->all());

        if ($request->has('criteria')) {
            $competence->criteria()->sync($request->criteria);
        }

        if ($request->hasfile('image')) {
            $url = Storage::put('competences', $request->file('image'));
            if ($competence->image) {
                Storage::delete($competence->image->url);
                $competence->image()->update([
                    'url' => $url
                ]);
            } else {
                $competence->image()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('admin.competences.index')->with('info', 'La categoria se actualizo exito!');
    }

    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('admin.competences.index')->with('info', 'La categoria se elimino con exito!');
    }

    public function criteria(Competence $competence)
    {
        $users = User::role('Juez')->pluck('name', 'id');
        return view('admin.competences.criteria.edit', compact('competence', 'users'));
    }
}
