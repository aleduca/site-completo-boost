<x-layouts.app title="Cursos">
    <div class="mx-auto max-w-5xl space-y-8">
        <div class="flex flex-col gap-2 border-b border-zinc-800/80 pb-6">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                Cursos
            </h1>
            <p class="text-sm sm:text-base text-zinc-400">
                Acompanhe as trilhas completas de aprendizado disponíveis no Clube Full-Stack.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse ($courses as $course)
                <div class="rounded-2xl border border-zinc-800/80 bg-zinc-900/60 p-6 flex flex-col justify-between hover:border-zinc-700 hover:bg-zinc-900/90 transition-all">
                    <div>
                        <div class="flex items-center justify-between text-xs text-zinc-400 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-500/10 px-2.5 py-0.5 font-medium text-red-400 border border-red-500/20">
                                Curso Completo
                            </span>
                            <span>{{ $course->lessons_count }} {{ $course->lessons_count === 1 ? 'aula' : 'aulas' }}</span>
                        </div>
                        <h2 class="text-lg font-bold text-white mb-2">{{ $course->title }}</h2>
                        <p class="text-sm text-zinc-400 leading-relaxed">{{ $course->description }}</p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-zinc-800/80 flex items-center justify-between">
                        <span class="text-xs text-zinc-500">Gratuito</span>
                        <a
                            href="{{ route('home', ['search' => $course->title]) }}"
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-400 hover:text-red-300 transition-colors"
                        >
                            <span>Ver aulas deste curso</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-zinc-800 p-8 text-center text-zinc-400">
                    Nenhum curso cadastrado no momento.
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
