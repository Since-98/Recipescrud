<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Spaghetti Carbonara',
                'ingredients' => "Spaghetti\nEggs\nParmesan cheese\nPancetta\nBlack pepper\nSalt",
                'instructions' => "Cook spaghetti until al dente.\nFry pancetta until crispy.\nWhisk eggs and cheese together.\nCombine pasta with pancetta, remove from heat, stir in egg mixture.\nSeason with pepper and serve immediately.",
                'image' => 'recipes/carbonara.jpg',
            ],
            [
                'title' => 'Chicken Curry',
                'ingredients' => "Chicken breast\nOnion\nGarlic\nGinger\nCurry powder\nCoconut milk\nSalt\nOil",
                'instructions' => "Sauté onion, garlic, and ginger.\nAdd curry powder and toast briefly.\nAdd chicken and cook until sealed.\nPour in coconut milk and simmer until chicken is cooked.\nSeason and serve with rice.",
                'image' => 'recipes/chicken-curry.jpg',
            ],
            [
                'title' => 'Classic Pancakes',
                'ingredients' => "Flour\nMilk\nEggs\nBaking powder\nSugar\nSalt\nButter",
                'instructions' => "Mix dry ingredients.\nWhisk milk and eggs together.\nCombine wet and dry ingredients.\nCook on a buttered pan until bubbles form, flip and finish.\nServe warm with syrup.",
                'image' => 'recipes/pancakes.jpg',
            ],
            [
                'title' => 'Caesar Salad',
                'ingredients' => "Romaine lettuce\nCroutons\nParmesan cheese\nCaesar dressing\nChicken breast (optional)",
                'instructions' => "Wash and chop lettuce.\nGrill or pan-fry chicken if using.\nToss lettuce with dressing.\nTop with croutons, parmesan, and sliced chicken.\nServe chilled.",
                'image' => 'recipes/caesar-salad.jpg',
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }

        $this->command->info('✅ Real recipes seeded successfully.');
    }
}
