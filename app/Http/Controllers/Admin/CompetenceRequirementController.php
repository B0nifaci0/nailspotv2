<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequirementRequest;
use App\Models\Competence;
use App\Models\Requirement;
use Illuminate\Http\Request;

class CompetenceRequirementController extends Controller
{
    public function index(Competence $competence)
    {
        $requirements = $competence->requirements;

        return view('admin.competences.requirements.index', compact('competence', 'requirements'));
    }

    public function store(RequirementRequest $request)
    {
        $competence = Competence::findOrFail($request->competence_id);

        $competence->requirements()->create([
            'description' => $request->description,
            'requirement_type' => Competence::class,
            'requirement_id' => $competence->id,
        ]);

        return redirect()->route('admin.competences.requirements.index', $competence)->with('info', 'El requerimiento ha sido agregado con exito!');;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $requirement = Requirement::findOrFail($id);
        $competence = Competence::find($requirement->requirementable_id);
        $requirement->delete();

        return redirect()->route('admin.competences.requirements.index', $competence)->with('info', 'El requerimiento ha sido eliminado con exito!');
    }
}
