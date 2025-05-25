@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">{{ isset($recipe) ? 'Edit Recipe' : 'Create New Recipe' }}</h1>
        
        <form action="{{ isset($recipe) ? route('recipes.update', $recipe) : route('recipes.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($recipe))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $recipe->title ?? '') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" 
                          id="description" 
                          rows="3" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          required>{{ old('description', $recipe->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ingredients">Ingredients</label>
                <textarea name="ingredients" 
                          id="ingredients" 
                          rows="5" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          required>{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
                @error('ingredients')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="instructions">Instructions</label>
                <textarea name="instructions" 
                          id="instructions" 
                          rows="5" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          required>{{ old('instructions', $recipe->instructions ?? '') }}</textarea>
                @error('instructions')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cooking_time">Cooking Time (minutes)</label>
                <input type="number" 
                       name="cooking_time" 
                       id="cooking_time" 
                       value="{{ old('cooking_time', $recipe->cooking_time ?? '') }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('cooking_time')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="difficulty">Difficulty</label>
                <select name="difficulty" 
                        id="difficulty" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Difficulty</option>
                    <option value="Easy" {{ (old('difficulty', $recipe->difficulty ?? '') == 'Easy') ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ (old('difficulty', $recipe->difficulty ?? '') == 'Medium') ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ (old('difficulty', $recipe->difficulty ?? '') == 'Hard') ? 'selected' : '' }}>Hard</option>
                </select>
                @error('difficulty')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Recipe Image</label>
                <input type="file" 
                       name="image" 
                       id="image" 
                       accept="image/*"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ isset($recipe) ? 'Update Recipe' : 'Create Recipe' }}
                </button>
                <a href="{{ route('recipes.index') }}" 
                   class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>
        </form>
    </div>
@endsection
