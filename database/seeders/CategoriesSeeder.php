<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    protected $categories = [
        'Elettronica',
        'Abbigliamento',
        'Motori',
        'Immobili',
        'Sport',
        'Giochi',
        'Libri',
        'Arredamento',
        'Bellezza',
        'Giardinaggio'
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
