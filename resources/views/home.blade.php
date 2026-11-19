<x-layouts.app title="Aulas do YouTube">
    <div class="mx-auto max-w-5xl space-y-8">
        <!-- Topo: Título da Seção e Introdução -->
        <div class="flex flex-col gap-2 border-b border-zinc-800/80 pb-6">
            <div class="flex items-center gap-2">
                <span class="inline-flex h-2.5 w-2.5 rounded-full bg-brand-400 animate-pulse"></span>
                <span class="text-xs font-semibold uppercase tracking-wider text-brand-300">Conteúdo Gratuito</span>
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white">
                Aulas do Clube Full-Stack
            </h1>
            <p class="text-sm sm:text-base text-zinc-400 max-w-2xl">
                Explore nossas videoaulas publicadas no YouTube. Assista diretamente na plataforma clicando em qualquer aula.
            </p>
        </div>

        <!-- Área de Filtros e Busca -->
        <div class="rounded-2xl border border-zinc-800 bg-zinc-900/70 p-4 sm:p-5 shadow-sm">
            <form action="{{ route('home') }}" method="GET" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <!-- Campo de Busca por Título ou Categoria -->
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-zinc-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Buscar por título da aula ou categoria..."
                        class="w-full rounded-xl border border-zinc-700/80 bg-zinc-950/80 pl-11 pr-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand-400 focus:outline-none focus:ring-1 focus:ring-brand-400 transition-colors"
                    >
                </div>

                <!-- Filtro por Categoria Selecionada -->
                <div class="flex items-center gap-2">
                    <select
                        name="category"
                        class="rounded-xl border border-zinc-700/80 bg-zinc-950/80 px-3.5 py-2.5 text-sm text-zinc-200 focus:border-brand-400 focus:outline-none focus:ring-1 focus:ring-brand-400 transition-colors"
                    >
                        <option value="">Todas as Categorias</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>
                                {{ $category->name }} ({{ $category->lessons_count }})
                            </option>
                        @endforeach
                    </select>

                    <!-- Botão Filtrar -->
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-600 active:bg-brand-800 transition-colors shadow-sm shadow-brand/30 ring-1 ring-brand-400/40 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 focus:ring-offset-zinc-950 cursor-pointer"
                    >
                        Filtrar
                    </button>

                    <!-- Botão Limpar Filtros se houver busca ativa -->
                    @if ($search || $selectedCategory)
                        <a
                            href="{{ route('home') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-zinc-700 bg-zinc-800/80 px-3.5 py-2.5 text-sm font-medium text-zinc-300 hover:bg-zinc-700 hover:text-white transition-colors"
                            title="Limpar busca e filtros"
                        >
                            Limpar
                        </a>
                    @endif
                </div>
            </form>

            <!-- Categorias Rápidas em Pills -->
            <div class="mt-4 flex flex-wrap items-center gap-1.5 border-t border-zinc-800/80 pt-3 text-xs">
                <span class="text-zinc-500 font-medium mr-1">Filtro rápido:</span>
                <a
                    href="{{ route('home', ['search' => $search]) }}"
                    class="rounded-lg px-2.5 py-1 font-medium transition-colors {{ empty($selectedCategory) ? 'bg-brand text-white ring-1 ring-brand-400/40 shadow-sm shadow-brand/30' : 'text-zinc-400 hover:bg-zinc-800 hover:text-brand-300' }}"
                >
                    Todas
                </a>
                @foreach ($categories as $category)
                    <a
                        href="{{ route('home', ['category' => $category->slug, 'search' => $search]) }}"
                        class="rounded-lg px-2.5 py-1 font-medium transition-colors {{ $selectedCategory === $category->slug ? 'bg-brand text-white ring-1 ring-brand-400/40 shadow-sm shadow-brand/30' : 'text-zinc-400 hover:bg-zinc-800 hover:text-brand-300' }}"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Indicador de Resultados -->
        <div class="flex items-center justify-between text-xs sm:text-sm text-zinc-400">
            <div>
                @if ($search || $selectedCategory)
                    <span>Filtrando por:
                        @if ($search)
                            <strong class="text-zinc-200">"{{ $search }}"</strong>
                        @endif
                        @if ($search && $selectedCategory) e @endif
                        @if ($selectedCategory)
                            categoria <strong class="text-zinc-200">{{ $categories->firstWhere('slug', $selectedCategory)?->name }}</strong>
                        @endif
                        — <strong class="text-zinc-200">{{ $lessons->total() }}</strong> {{ $lessons->total() === 1 ? 'aula encontrada' : 'aulas encontradas' }}
                    </span>
                @else
                    <span>Total de <strong class="text-zinc-200">{{ $lessons->total() }}</strong> aulas disponíveis</span>
                @endif
            </div>
        </div>

        <!-- Lista Vertical de Aulas -->
        @if ($lessons->count() > 0)
            <div class="flex flex-col gap-4">
                @foreach ($lessons as $lesson)
                    <x-lesson-card :lesson="$lesson" />
                @endforeach
            </div>

            <!-- Paginação no Fim -->
            <div class="pt-6 border-t border-zinc-800/80">
                {{ $lessons->links() }}
            </div>
        @else
            <!-- Estado Vazio -->
            <div class="rounded-2xl border border-dashed border-zinc-800 bg-zinc-900/30 p-12 text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-zinc-800 text-zinc-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-white">Nenhuma aula encontrada</h3>
                <p class="mt-1 text-sm text-zinc-400">Tente buscar por outro termo ou remova os filtros ativos.</p>
                <div class="mt-6">
                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center rounded-xl bg-brand px-4 py-2 text-sm font-semibold text-white hover:bg-brand-600 transition-colors ring-1 ring-brand-400/40 shadow-sm shadow-brand/30"
                    >
                        Ver todas as aulas
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
