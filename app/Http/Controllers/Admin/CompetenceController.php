<?php

namespace App\Http\Controllers\Admin;

use App\Models\Competence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompetenceRequest;
use App\Models\Category;
use App\Models\CategoryCompetence;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::with('categories')->paginate(10);
        return view('admin.competences.index', compact('competences'));
    }

    public function create()
    {
        $categories = Category::all();
        if ($categories->count() == 0) {
            return redirect()->route('admin.subcategories.create')->with('info', 'Debe crear una categoria antes de crear una competencia');
        }
        return view('admin.competences.create', compact('categories'));
    }

    public function store(CompetenceRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:competences'
        ]);
        $competence = Competence::create($request->all());
        $competence->categories()->attach($request->categories);
        if ($request->hasFile("image")) {
            $image = file_get_contents($request->file("image")->path());
            $base64Image = base64_encode($image);
            $url = $this->saveImages($base64Image, "competences", $competence->id);
            $competence->image()->create([
                "url" => $url,
            ]);
        }

        if ($request->hasfile('pdf')) {
            $cert = Storage::disk('public')->put('certificates', $request->file('pdf'));
            $competence->certificate()->create([
                'url' => $cert
            ]);
        }

        return redirect()->route('admin.competences.index')->with('info', 'La competencia se creo con exito!');
    }

    public function show(Competence $competence)
    {

        if ($competence->image) {
            $competence->image->url = $this->getS3URL("competences", $competence->id);
        }
        return view('admin.competences.show', compact('competence'));
    }

    public function edit(Competence $competence)
    {
        $categories = Category::all();
        if ($competence->image) {
            $competence->image->url = $this->getS3URL("competences", $competence->id);
        }
        return view('admin.competences.edit', compact('competence', 'categories'));
    }

    public function update(CompetenceRequest $request, Competence $competence)
    {
        $request->validate([
            'name' => 'required|unique:competences,name,' . $competence->id
        ]);

        $competence->update($request->all());
        $competence->categories()->sync($request->categories);
        if ($request->hasFile("image")) {
            $image = file_get_contents($request->file("image")->path());
            $base64Image = base64_encode($image);
            $competence->image->url = $this->saveImages(
                $base64Image,
                "competences",
                $competence->id
            );
        }

        if ($request->hasfile('pdf')) {
            $url = Storage::disk('public')->put('certificates', $request->file('pdf'));
            if ($competence->certificate) {
                Storage::delete($competence->certificate->url);
                $competence->certificate()->update([
                    'url' => $url
                ]);
            } else {
                $competence->certificate()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.competences.index')->with('info', 'La competencia se actualizo con exito!');
    }

    public function destroy(Competence $competence)
    {
        if ($competence->status == Competence::PUBLICADO) {
            return redirect()->route('admin.competences.index')->with('warning', 'La competencia no se puede eliminar porque esta en curso!');
        }
        $competence->delete();
        return redirect()->route('admin.competences.index')->with('info', 'La competencia se elimino con exito!');
    }

    public function publish(Competence $competence)
    {
        $subcompetences =  $competence->subcompetences;
        if ($competence->categories_count <= 0) {
            return back()->with('warning', 'Por favor agrega categorias a la competencia');
        }
        if ($competence->subcompetences_count <= 0) {
            return back()->with('warning', 'Por favor agrega subcompetencias a la competencia');
        }
        if ($competence->status == Competence::PUBLICADO) {
            $competence->status = Competence::BORRADOR;
        } else {
            $competence->status = Competence::PUBLICADO;
        }
        $competence->save();
        return back()->with('info', 'El status de la competencia ha sido actualizado exitosamente!');
    }

    public function sales()
    {
        return view('admin.competences.sales');
    }

    public function details(Competence $competence)
    {
        return view('admin.competences.details', compact('competence'));
    }

    public function indexCategories(Competence $competence)
    {
        $categories = $competence->categories;
        return view('admin.competences.categories.index', compact('competence', 'categories'));
    }

    public function destroyCategory(Competence $competence, $category)
    {
        if ($competence->status == Competence::PUBLICADO) {
            return back()->with('warning', "No se puede eliminar la categoría porque la competencia esta en curso");
        }
        $category = CategoryCompetence::Where('category_id', $category)->Where('competence_id', $competence->id)->first();
        $category->delete();
        return back()->with('info', 'La categoría se elimino con exito!');
    }
}
