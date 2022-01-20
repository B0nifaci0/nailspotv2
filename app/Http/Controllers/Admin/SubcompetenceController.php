<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Competence;
use App\Models\Level;
use App\Models\Subcompetence;
use Illuminate\Http\Request;
use App\Http\Requests\SubcompetenceRequest;
use App\Models\Criterion;
use App\Models\CriterionSubcompetenceUser;
use App\Models\User;

class SubcompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competence $competence, Category $category)
    {
        $subcompetences = $competence->subcompetences()->where('category_id', $category->id)->get();
        return view('admin.subcompetences.index', compact('subcompetences', 'competence', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competence $competence, Category $category)
    {
        $levels = Level::all();
        return view('admin.subcompetences.create', compact('competence', 'category', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcompetenceRequest $request, Competence $competence, Category $category)
    {
        $subcompetences = Subcompetence::create($request->all());
        $subcompetences->categories()->syncWithPivotValues($category->id, ['competence_id' => $competence->id]);
        $subcompetences->levels()->attach($request->levels);
        return redirect()->route('admin.subcompetences.index', compact('competence', 'category'))->with('info', 'La subcompetencia se creo con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competence $competence, Category $category,Subcompetence $subcompetence)
    {
        return view('admin.subcompetence.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence, Category $category, Subcompetence $subcompetence)
    {
        $levels = Level::all();
        return view('admin.subcompetences.edit', (compact('competence', 'category', 'subcompetence', 'levels')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcompetenceRequest $request, Competence $competence, Category $category, Subcompetence $subcompetence)
    {
        $subcompetence->update($request->all());
        $subcompetence->levels()->sync($request->levels);
        return redirect()->route('admin.subcompetences.index', compact('competence', 'category'))->with('info', 'La subcompetencia se actualizo con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcompetence $subcompetence)
    {
        return "Gola";
        //$subcompetence->delete();
        return redirect()->route('admin.subcompetences.index', compact('competence', 'category'))->with('info', 'La subcompetencia se elimino con exito!');
    }

    public function indexCriteria(Competence $competence, Category $category, Subcompetence $subcompetence)
    {
        $criteria = Criterion::pluck('name', 'id');
        $judges = User::role('Juez')->pluck('name', 'id');

        if ($criteria->count() == 0) {
            return redirect()->route('admin.criteria.create')->with('info', 'Debe crear criterios antes de poderlos asignar a una competencia');
        }

        if ($judges->count() == 0) {
            return redirect()->route('admin.users.index')->with('info', 'Debe asignar el rol de juez al menos a un usuario para poderlo asignar a una competencia');
        }

        $criteria_subcompetence = CriterionSubcompetenceUser::whereSubcompetenceId($subcompetence->id)->get();

        return view('admin.subcompetences.criteria.index', compact('competence','category', 'subcompetence', 'judges', 'criteria', 'criteria_subcompetence'));
    }

    public function assignJudge(Request $request, Competence $competence, Category $category, Subcompetence $subcompetence)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'subcompetence_id' => 'required',
        ]);

        $subcompetence = Subcompetence::find($request->subcompetence_id);
        if (CriterionSubcompetenceUser::exist($request)->first()) {
            return redirect()->route('admin.subcompetences.index-criteria',compact('competence','category', 'subcompetence' ))->with('warning', 'El juez ya cuenta con ese criterio asignado!');
        }

        CriterionSubcompetenceUser::create($request->all());

        return redirect()->route('admin.subcompetences.index-criteria', compact('competence','category', 'subcompetence'))->with('info', 'El criterio ha sido agregado con exito!');
    }

    public function destroyCriteria($id)
    {
        $item = CriterionSubcompetenceUser::find($id);
        $competence = Subcompetence::find($item->subcompetence->id);
        $item->delete();
        return redirect()->route('admin.subcompetences.index-criteria', $competence)->with('info', 'El criterio ha sido eliminado con exito!');
    }
}
