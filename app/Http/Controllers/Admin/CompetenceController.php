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
        return view('admin.competences.create', compact('levels', 'subcategories'));
    }

    public function store(CompetenceRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:competences'
        ]);

        $competence = Competence::create($request->all());

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

    public function indexCriteria(Competence $competence)
    {
        $criteria = Criterion::pluck('name', 'id');
        $judges = User::role('Juez')->pluck('name', 'id');
        $competition_users = $competence->users()->with('criteria')->get()->unique('criteria');

        return view('admin.competences.criteria.index', compact('competence', 'judges', 'criteria', 'competition_users'));
    }

    public function assignJudge(Request $request)
    {
        $competence = Competence::find($request->competence_id);

        if ($competence->users->find($request->judge_id)->criteria->find($request->criterion_id)) {
            return redirect()->route('admin.competences.index-criteria', $competence)->with('warning', 'El juez ya cuenta con ese criterio asignado!');
        }

        $competence->criteria()->attach($request->criterion_id, ['user_id' => $request->judge_id]);

        return redirect()->route('admin.competences.index-criteria', $competence)->with('info', 'El criterio ha sido agregado con exito!');
    }

    public function destroyCriteria(Criterion $criterion, Competence $competence, User $user)
    {

        $criterion->users()->detach($user, ['competence_id' => $competence->id]);

        return redirect()->route('admin.competences.index-criteria', $competence)->with('info', 'El criterio ha sido eliminado con exito!');
    }
}
