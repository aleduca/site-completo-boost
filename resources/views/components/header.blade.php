<header class="sticky top-0 z-40 flex h-16 w-full items-center justify-between border-b border-zinc-800 bg-zinc-900/95 px-4 backdrop-blur sm:px-6">
    <!-- Esquerda: Toggle do Menu + Espaço para a Logo -->
    <div class="flex items-center gap-3 sm:gap-4">
        <!-- Botão Toggle Mobile -->
        <button
            type="button"
            @click="mobileSidebarOpen = !mobileSidebarOpen"
            class="inline-flex items-center justify-center rounded-lg p-2 text-zinc-400 hover:bg-zinc-800 hover:text-zinc-100 focus:outline-none focus:ring-2 focus:ring-brand md:hidden"
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
            class="hidden items-center justify-center rounded-lg p-2 text-zinc-400 hover:bg-zinc-800 hover:text-zinc-100 focus:outline-none focus:ring-2 focus:ring-brand md:inline-flex"
            aria-label="Recolher ou expandir menu"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </button>

        <!-- Espaço para Logo sem background com texto ao lado -->
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 bg-transparent group">
            <img
                src="{{ asset('logo/logo.png') }}"
                alt="Clube Full-Stack"
                class="h-10 sm:h-11 w-auto max-w-[180px] sm:max-w-[220px] object-contain bg-transparent transition-transform duration-200 group-hover:scale-105"
            >
            <div class="flex flex-col">
                <span class="text-lg font-bold tracking-tight text-white flex items-center gap-1">
                    Clube <span class="text-brand-300">Full-Stack</span>
                </span>
                <span class="text-[10px] uppercase font-semibold tracking-wider text-zinc-400 -mt-1 hidden sm:block">Aulas & Tutoriais</span>
            </div>
        </a>
    </div>

    <!-- Direita: Mensagem de Boas-Vindas + Botões -->
    <div class="flex items-center gap-3">
        @auth
            <div class="flex items-center gap-3">
                <div class="hidden text-right text-xs sm:block">
                    <p class="font-medium text-zinc-200">Olá, <span class="text-brand-300 font-semibold">{{ auth()->user()->name }}</span>!</p>
                    <p class="text-zinc-500">Bem-vindo de volta</p>
                </div>
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-brand/25 text-brand-300 ring-1 ring-brand-500/40 text-sm font-semibold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <!-- Botão Sair / Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-700 bg-zinc-800/80 px-3 py-1.5 text-xs font-semibold text-zinc-300 hover:bg-zinc-700 hover:text-white transition-colors"
                        title="Sair da conta"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        <span class="hidden sm:inline">Sair</span>
                    </button>
                </form>
            </div>
        @else
            <div class="flex items-center gap-2.5 sm:gap-3">
                <div class="hidden text-right text-xs md:block">
                    <p class="font-medium text-zinc-300">Bem-vindo ao <span class="text-zinc-100 font-semibold">Clube Full-Stack</span>!</p>
                    <p class="text-zinc-500">Aproveite todo o conteúdo gratuito</p>
                </div>

                <!-- Botão Cadastrar-se (usuário deslogado) -->
                <a
                    href="{{ Route::has('register') ? route('register') : '/register' }}"
                    class="inline-flex items-center gap-1.5 rounded-lg border border-brand-500/40 bg-brand/20 px-3.5 py-1.5 text-xs font-semibold text-brand-200 hover:bg-brand/35 hover:text-white transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.765Z" />
                    </svg>
                    <span>Cadastrar</span>
                </a>

                <!-- Botão Entrar / Login -->
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand px-3.5 py-1.5 text-xs font-semibold text-white shadow-sm shadow-brand/30 hover:bg-brand-600 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span>Entrar</span>
                </a>
            </div>
        @endauth
    </div>
</header>
