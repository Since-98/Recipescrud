@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h4>Edit Recipe</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $recipe->title) }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ingredients</label>
                <textarea name="ingredients" class="form-control" rows="4" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                @error('ingredients') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Instructions</label>
                <textarea name="instructions" class="form-control" rows="5" required>{{ old('instructions', $recipe->instructions) }}</textarea>
                @error('instructions') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label><br>
                @if($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" width="100" class="mb-2 rounded">
                @endif
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Recipe</button>
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
