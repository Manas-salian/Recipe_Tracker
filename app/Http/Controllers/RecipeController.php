<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe-images', 'public');
            $validated['image_path'] = $imagePath;
        }

        Recipe::create($validated);
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
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
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe-images', 'public');
            $validated['image_path'] = $imagePath;
        }

        $recipe->update($validated);
        return redirect()->route('recipes.show', $recipe)->with('success', 'Recipe updated successfully!');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
