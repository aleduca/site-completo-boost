<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Laravel do Zero ao Avançado',
                'description' => 'Aprenda a construir aplicações completas e robustas utilizando todo o ecossistema do Laravel.',
            ],
            [
                'title' => 'Dominando Tailwind CSS',
                'description' => 'Construa layouts responsivos, modernos e componentes reutilizáveis utilizando Tailwind CSS.',
            ],
            [
                'title' => 'Alpine.js na Prática',
                'description' => 'Adicione interatividade dinâmica de forma simples e eficiente em suas views Blade.',
            ],
            [
                'title' => 'PHP 8 Moderno e Orientação a Objetos',
                'description' => 'Domine os novos recursos da linguagem PHP, tipagem estrita, atributos e padrões de projeto.',
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['slug' => Str::slug($course['title'])],
                [
                    'title' => $course['title'],
                    'description' => $course['description'],
                ]
            );
        }
    }
}
