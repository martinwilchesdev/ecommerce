<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();

        return view('admin.categories.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'family_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        Category::create([
            'family_id' => $request->family_id,
            'name' => $request->name
        ]);

        session()->flash('swal', [
            'title' => 'Éxito',
            'text' => 'Categoría creada correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::orderBy('id')->get();

        return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'family_id' => 'required|integer'
        ]);

        $category->update($request->all());

        session()->flash('swal', [
            'title' => 'Éxito',
            'text' => 'Categoría actualizada correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->subcategories()->count() > 0) {
            session()->flash('swal', [
                'title' => 'Error',
                'text' => 'La categoría tiene subcategorías asociadas.',
                'icon' => 'error'
            ]);

            return redirect()->route('admin.categories.edit', $category);
        }

        $category->delete();

        session()->flash('swal', [
            'title' => 'Éxito',
            'text' => 'Categoría eliminada correctamente.',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.index');
    }
}
