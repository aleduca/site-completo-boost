<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Laravel',
                'description' => 'Aulas e dicas sobre o framework PHP mais utilizado no mundo.',
            ],
            [
                'name' => 'PHP',
                'description' => 'Fundamentos, novidades e boas práticas de PHP moderno.',
            ],
            [
                'name' => 'Tailwind CSS',
                'description' => 'Estilização moderna de interfaces com classes utilitárias.',
            ],
            [
                'name' => 'Alpine.js',
                'description' => 'Interatividade leve e declarativa direto no HTML.',
            ],
            [
                'name' => 'JavaScript',
                'description' => 'JavaScript moderno, ES6+, APIs do navegador e utilidades.',
            ],
            [
                'name' => 'DevOps & Docker',
                'description' => 'Ambientes de desenvolvimento, containers e deploy.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
