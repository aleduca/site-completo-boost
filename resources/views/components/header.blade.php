<header class="sticky top-0 z-40 flex h-16 w-full items-center justify-between border-b border-zinc-800 bg-zinc-900/95 px-4 backdrop-blur sm:px-6">
    <!-- Esquerda: Toggle do Menu + Espaço para a Logo -->
    <div class="flex items-center gap-3 sm:gap-4">
        <!-- Botão Toggle Mobile -->
        <button
            type="button"
            @click="mobileSidebarOpen = !mobileSidebarOpen"
            class="inline-flex items-center justify-center rounded-lg p-2 text-zinc-400 hover:bg-zinc-800 hover:text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-600 md:hidden"
            aria-label="Abrir menu de navegação"
        >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <!-- Botão Toggle Desktop Retrátil -->
        <button
            type="button"
            @click="sidebarOpen = !sidebarOpen"
            class="hidden items-center justify-center rounded-lg p-2 text-zinc-400 hover:bg-zinc-800 hover:text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-600 md:inline-flex"
            aria-label="Recolher ou expandir menu"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </button>

        <!-- Espaço para Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-red-600 to-rose-500 shadow-md shadow-red-500/20 group-hover:scale-105 transition-transform duration-200">
                <!-- Ícone Play / YouTube -->
                <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-lg font-bold tracking-tight text-white flex items-center gap-1">
                    Clube <span class="text-red-500">Full-Stack</span>
                </span>
                <span class="text-[10px] uppercase font-semibold tracking-wider text-zinc-400 -mt-1 hidden sm:block">Aulas & Tutoriais</span>
            </div>
        </a>
    </div>

    <!-- Direita: Mensagem de Boas-Vindas -->
    <div class="flex items-center gap-3">
        @auth
            <div class="flex items-center gap-3">
                <div class="hidden text-right text-xs sm:block">
                    <p class="font-medium text-zinc-200">Olá, <span class="text-red-400 font-semibold">{{ auth()->user()->name }}</span>!</p>
                    <p class="text-zinc-500">Bem-vindo de volta</p>
                </div>
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-red-600/20 text-red-400 ring-1 ring-red-500/30 text-sm font-semibold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        @else
            <div class="flex items-center gap-3">
                <div class="hidden text-right text-xs md:block">
                    <p class="font-medium text-zinc-300">Bem-vindo ao <span class="text-zinc-100 font-semibold">Clube Full-Stack</span>!</p>
                    <p class="text-zinc-500">Aproveite todo o conteúdo gratuito</p>
                </div>
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-red-500 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    <span>Entrar</span>
                </a>
            </div>
        @endauth
    </div>
</header>
