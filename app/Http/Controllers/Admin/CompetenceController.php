<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
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
            $url = Storage::put('public/competences', $request->file('image'));
            $competence->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.competences.index')->with('info', 'La competencia se creo con exito!');
    }

    public function edit(Subcategory $category)
    {
        return view('admin.competences.edit', compact('category'));
    }

    public function update(Request $request, Subcategory $category)
    {
        $request->validate([
            'name' => 'required|unique:competences,name,' . $category->id
        ]);
        $category->update($request->all());
        return redirect()->route('admin.competences.index')->with('info', 'La categoria se actualizo exito!');
    }

    public function destroy(Subcategory $category)
    {
        $category->delete();
        return redirect()->route('admin.subcategories.index')->with('info', 'La categoria se elimino con exito!');
    }
}
