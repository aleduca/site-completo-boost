<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laravelCategory = Category::where('slug', 'laravel')->first();
        $phpCategory = Category::where('slug', 'php')->first();
        $tailwindCategory = Category::where('slug', 'tailwind-css')->first();
        $alpineCategory = Category::where('slug', 'alpine-js')->first();
        $jsCategory = Category::where('slug', 'javascript')->first();

        $laravelCourse = Course::where('slug', 'laravel-do-zero-ao-avancado')->first();
        $tailwindCourse = Course::where('slug', 'dominando-tailwind-css')->first();
        $alpineCourse = Course::where('slug', 'alpine-js-na-pratica')->first();

        $lessons = [
            // Aulas associadas ao curso Laravel
            [
                'category_id' => $laravelCategory?->id,
                'course_id' => $laravelCourse?->id,
                'title' => 'Instalação e Configuração do Laravel 11',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Aprenda como instalar e preparar o ambiente para desenvolver com Laravel 11.',
            ],
            [
                'category_id' => $laravelCategory?->id,
                'course_id' => $laravelCourse?->id,
                'title' => 'Rotas, Controllers e Views no Laravel',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Entendendo o fluxo de requisição básico e a arquitetura MVC no Laravel.',
            ],
            [
                'category_id' => $laravelCategory?->id,
                'course_id' => $laravelCourse?->id,
                'title' => 'Migrations e Eloquent ORM',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Como modelar tabelas e criar relacionamentos usando o Eloquent ORM.',
            ],

            // Aulas associadas ao curso Tailwind CSS
            [
                'category_id' => $tailwindCategory?->id,
                'course_id' => $tailwindCourse?->id,
                'title' => 'Introdução ao Tailwind CSS e Utility-First',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Conceitos básicos de estilização com Tailwind CSS e configuração inicial.',
            ],
            [
                'category_id' => $tailwindCategory?->id,
                'course_id' => $tailwindCourse?->id,
                'title' => 'Criando Layouts Responsivos com Flexbox e Grid',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Aprenda a criar grids e containers responsivos utilizando breakpoints do Tailwind.',
            ],
            [
                'category_id' => $tailwindCategory?->id,
                'course_id' => $tailwindCourse?->id,
                'title' => 'Implementando Dark Mode com Tailwind CSS',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Configurando a estratégia de tema escuro e utilizando a classe dark nas suas views.',
            ],

            // Aulas associadas ao curso Alpine.js
            [
                'category_id' => $alpineCategory?->id,
                'course_id' => $alpineCourse?->id,
                'title' => 'Primeiros Passos com Alpine.js no Blade',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Utilizando x-data, x-show e x-bind para criar reatividade rápida sem build complexo.',
            ],
            [
                'category_id' => $alpineCategory?->id,
                'course_id' => $alpineCourse?->id,
                'title' => 'Criando Menus Retráteis e Modais com Alpine.js',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Construção de sidebar retrátil e componentes interativos acessíveis.',
            ],

            // Aulas AVULSAS (sem curso vinculado / course_id = null)
            [
                'category_id' => $phpCategory?->id,
                'course_id' => null,
                'title' => 'Novidades e Recursos do PHP 8.4',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Uma visão prática sobre property hooks, assimetria de visibilidade e novas funções do PHP 8.4.',
            ],
            [
                'category_id' => $jsCategory?->id,
                'course_id' => null,
                'title' => 'Dicas Rápidas de JavaScript Moderno',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Operadores de encadeamento opcional, nullish coalescing e desestruturação na prática.',
            ],
            [
                'category_id' => $laravelCategory?->id,
                'course_id' => null,
                'title' => 'Como Otimizar Queries com Eager Loading no Laravel',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Evitando o problema N+1 usando with, withCount e subqueries no Eloquent.',
            ],
            [
                'category_id' => $tailwindCategory?->id,
                'course_id' => null,
                'title' => '5 Truques Pouco Conhecidos no Tailwind CSS',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'description' => 'Classes arbitrárias, modificadores de grupo e truques para deixar seu CSS mais limpo.',
            ],
        ];

        foreach ($lessons as $lesson) {
            if ($lesson['category_id'] === null) {
                continue;
            }

            Lesson::firstOrCreate(
                ['slug' => Str::slug($lesson['title'])],
                [
                    'category_id' => $lesson['category_id'],
                    'course_id' => $lesson['course_id'],
                    'title' => $lesson['title'],
                    'video_url' => $lesson['video_url'],
                    'description' => $lesson['description'],
                ]
            );
        }
    }
}
