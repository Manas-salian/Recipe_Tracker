@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recipes as $recipe)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($recipe->image_path)
                    <img src="{{ Storage::url($recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $recipe->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($recipe->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Created on {{ $recipe->created_at->format('F j, Y') }}</span>
                        <a href="{{ route('recipes.show', $recipe) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Recipe</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
