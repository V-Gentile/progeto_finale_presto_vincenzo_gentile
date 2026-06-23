<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    protected $categories = [
        'Elettronica',
        'Abbigliamento',
        'Motori',
        'Immobili',
        'Sport',
        'Giochi',
        'Libri',
        'Arredamento'
    ];

    public function run(): void
    {
        Category::query()->delete();

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
