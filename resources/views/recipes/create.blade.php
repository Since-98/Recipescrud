@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Add New Recipe</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ingredients</label>
                <textarea name="ingredients" class="form-control" rows="4" required>{{ old('ingredients') }}</textarea>
                @error('ingredients') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Instructions</label>
                <textarea name="instructions" class="form-control" rows="5" required>{{ old('instructions') }}</textarea>
                @error('instructions') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image (optional)</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Recipe</button>
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
