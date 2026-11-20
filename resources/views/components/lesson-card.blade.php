@props(['lesson'])

<article class="group relative flex flex-col justify-between gap-4 rounded-2xl border border-zinc-800/80 bg-zinc-900/60 p-5 sm:p-6 shadow-sm transition-all duration-200 hover:border-zinc-700 hover:bg-zinc-900/90 hover:shadow-lg hover:shadow-black/40">
    <div class="flex flex-col gap-3">
        <!-- Badges: Categoria e Curso -->
        <div class="flex flex-wrap items-center gap-2">
            <!-- Categoria -->
            <a
                href="{{ route('home', ['category' => $lesson->category->slug]) }}"
                class="inline-flex items-center gap-1.5 rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400 border border-red-500/20 hover:bg-red-500/20 transition-colors"
            >
                <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>
                {{ $lesson->category->name }}
            </a>

            <!-- Curso ou Aula Avulsa -->
            @if ($lesson->course)
                <span class="inline-flex items-center gap-1.5 rounded-full bg-zinc-800/90 px-3 py-1 text-xs font-medium text-zinc-300 border border-zinc-700/60">
                    <svg class="h-3.5 w-3.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span>Curso: <strong class="text-zinc-200 font-semibold">{{ $lesson->course->title }}</strong></span>
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 px-3 py-1 text-xs font-medium text-amber-400 border border-amber-500/20">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                    Aula Avulsa
                </span>
            @endif
        </div>

        <!-- Título da Aula -->
        <h3 class="text-lg sm:text-xl font-bold tracking-tight text-white group-hover:text-red-400 transition-colors">
            {{ $lesson->title }}
        </h3>

        <!-- Descrição -->
        @if ($lesson->description)
            <p class="text-sm text-zinc-400 line-clamp-2 leading-relaxed">
                {{ $lesson->description }}
            </p>
        @endif
    </div>

    <!-- Rodapé do Card: Botão Assistir no YouTube em nova aba -->
    <div class="flex items-center justify-between border-t border-zinc-800/80 pt-4 mt-2">
        <span class="text-xs text-zinc-500 flex items-center gap-1">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Publicado no YouTube
        </span>

        <a
            href="{{ $lesson->video_url }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-4 py-2 text-xs sm:text-sm font-semibold text-white shadow-md shadow-red-600/20 hover:bg-red-500 active:bg-red-700 transition-all focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-zinc-950"
        >
            <svg class="h-4 w-4 fill-white shrink-0" viewBox="0 0 24 24">
                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
            <span>Assistir no YouTube</span>
            <svg class="h-3.5 w-3.5 text-white/80" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
        </a>
    </div>
</article>
