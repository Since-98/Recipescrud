<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
          $recipes = Recipe::latest()->paginate(5);
    return view('recipes.index', compact('recipes'));
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('recipes', 'public');
    }
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        Recipe::create($data);

        return redirect()->route('recipes.index')
                         ->with('success', 'Recipe created successfully.');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($data);

        return redirect()->route('recipes.index')
                         ->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')
                         ->with('success', 'Recipe deleted successfully.');
    }
}
