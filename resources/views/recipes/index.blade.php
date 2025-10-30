@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="hero">
        <div class="container">
            <h1>Delicious Recipes for Every Taste</h1>
            <p>Find your next favorite dish, or share your own culinary creations.</p>
            <a href="{{ route('recipes.create') }}" class="btn btn-warning text-white mt-3 px-4 py-2 rounded-pill">
                <i class="bi bi-plus-circle"></i> Share Your Recipe
            </a>
        </div>
    </section>

    {{-- Recipes Grid --}}
    <div class="container my-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($recipes->count())
            <div class="row g-4">
                @foreach ($recipes as $recipe)
                    <div class="col-md-4">
                        <div class="card recipe-card h-100">
                            @if($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                            @else
                                <img src="https://via.placeholder.com/400x250?text=No+Image" alt="No image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $recipe->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($recipe->ingredients, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <div>
                                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-outline-warning btn-sm me-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Delete this recipe?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $recipes->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <h4 class="text-muted">No recipes yet — be the first to share something delicious!</h4>
                <a href="{{ route('recipes.create') }}" class="btn btn-warning mt-3 text-white">
                    <i class="bi bi-plus-circle"></i> Add Recipe
                </a>
            </div>
        @endif
    </div>
@endsection
