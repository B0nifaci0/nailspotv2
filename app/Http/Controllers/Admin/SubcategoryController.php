<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        return view('admin.subcategories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories'
        ]);
        Subcategory::create($request->all());
        return redirect()->route('admin.subcategories.index')->with('info', 'La categoria se creo con exito!');
    }

    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|unique:subcategories,name,' . $subcategory->id
        ]);
        $subcategory->update($request->all());
        return redirect()->route('admin.subcategories.index')->with('info', 'La categoria se actualizo exito!');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('info', 'La categoria se elimino con exito!');
    }
}
