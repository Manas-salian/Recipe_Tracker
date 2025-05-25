@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        @if($recipe->image_path)
            <img src="{{ Storage::url($recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-64 object-cover">
        @endif
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $recipe->title }}</h1>
                <div class="flex space-x-2">
                    <a href="{{ route('recipes.edit', $recipe) }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Edit
                    </a>
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                onclick="return confirm('Are you sure you want to delete this recipe?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-gray-700">{{ $recipe->description }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-semibold mb-2">Cooking Time</h2>
                    <p class="text-gray-600">{{ $recipe->cooking_time ? $recipe->cooking_time . ' minutes' : 'Not specified' }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-semibold mb-2">Difficulty</h2>
                    <p class="text-gray-600">{{ $recipe->difficulty ?? 'Not specified' }}</p>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Ingredients</h2>
                <div class="bg-gray-50 p-4 rounded">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Instructions</h2>
                <div class="bg-gray-50 p-4 rounded">
                    {!! nl2br(e($recipe->instructions)) !!}
                </div>
            </div>

            <div class="mt-4 text-gray-500">
                <p>Created on {{ $recipe->created_at->format('F j, Y') }}</p>
            </div>
        </div>
    </div>
@endsection
