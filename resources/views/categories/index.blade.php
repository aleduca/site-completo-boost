<x-layouts.app title="Categorias">
    <div class="mx-auto max-w-5xl space-y-8">
        <div class="flex flex-col gap-2 border-b border-zinc-800/80 pb-6">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                Categorias
            </h1>
            <p class="text-sm sm:text-base text-zinc-400">
                Navegue pelas aulas organizadas por tecnologias e tópicos.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($categories as $category)
                <a
                    href="{{ route('home', ['category' => $category->slug]) }}"
                    class="group rounded-2xl border border-zinc-800/80 bg-zinc-900/60 p-6 flex flex-col justify-between hover:border-brand-500/50 hover:bg-zinc-900/90 transition-all shadow-sm"
                >
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-brand/20 text-brand-300 ring-1 ring-brand-500/30 group-hover:bg-brand group-hover:text-white transition-colors font-bold text-sm">
                                {{ strtoupper(substr($category->name, 0, 2)) }}
                            </span>
                            <span class="text-xs text-zinc-500 font-medium group-hover:text-zinc-300">
                                {{ $category->lessons_count }} {{ $category->lessons_count === 1 ? 'aula' : 'aulas' }}
                            </span>
                        </div>
                        <h2 class="text-base font-bold text-white group-hover:text-brand-300 transition-colors mb-1.5">
                            {{ $category->name }}
                        </h2>
                        <p class="text-xs text-zinc-400 line-clamp-2 leading-relaxed">
                            {{ $category->description ?? 'Explore todas as aulas sobre ' . $category->name . '.' }}
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-brand-300 font-medium">
                        <span>Ver aulas</span>
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-zinc-800 p-8 text-center text-zinc-400">
                    Nenhuma categoria cadastrada.
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
