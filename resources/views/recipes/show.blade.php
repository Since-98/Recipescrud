@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h4>{{ $recipe->title }}</h4>
    </div>
    <div class="card-body">
        @if($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid rounded mb-3" style="max-height:300px;">
        @endif

        <h5>Ingredients:</h5>
        <p>{{ $recipe->ingredients }}</p>

        <h5>Instructions:</h5>
        <p>{{ $recipe->instructions }}</p>

        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this recipe?')">Delete</button>
        </form>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
