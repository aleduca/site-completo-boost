<!-- Backdrop no mobile -->
<div
    x-show="mobileSidebarOpen"
    x-cloak
    @click="mobileSidebarOpen = false"
    x-transition:enter="transition-opacity ease-linear duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-40 bg-black/70 backdrop-blur-xs md:hidden"
></div>

<!-- Sidebar Drawer no Mobile -->
<aside
    x-show="mobileSidebarOpen"
    x-cloak
    x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-zinc-800 bg-zinc-900 p-4 md:hidden shadow-2xl"
>
    <!-- Header da Sidebar Mobile -->
    <div class="flex items-center justify-between border-b border-zinc-800 pb-4">
        <div class="flex items-center gap-2">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand text-white font-bold text-sm ring-1 ring-brand-400/40 shadow-sm shadow-brand/30">
                CF
            </div>
            <span class="font-bold text-zinc-100">Clube Full-Stack</span>
        </div>
        <button
            type="button"
            @click="mobileSidebarOpen = false"
            class="rounded-lg p-1.5 text-zinc-400 hover:bg-zinc-800 hover:text-zinc-100"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navegação Mobile -->
    <nav class="mt-4 flex flex-1 flex-col gap-1.5">
        <a
            href="{{ route('lessons.index') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('lessons.index') || request()->routeIs('home') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-300 hover:bg-zinc-800 hover:text-brand-300' }}"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
            </svg>
            <span>Aulas</span>
        </a>

        <a
            href="{{ route('courses.index') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('courses.*') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-300 hover:bg-zinc-800 hover:text-brand-300' }}"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <span>Cursos</span>
        </a>

        <a
            href="{{ route('categories.index') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('categories.*') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-300 hover:bg-zinc-800 hover:text-brand-300' }}"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>
            <span>Categorias</span>
        </a>
    </nav>

    <!-- Rodapé da Sidebar Mobile: Login ou Logout -->
    <div class="border-t border-zinc-800 pt-3">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="w-full flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-zinc-400 hover:bg-zinc-800 hover:text-brand-300 transition-colors cursor-pointer"
                >
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    <span>Sair da conta</span>
                </button>
            </form>
        @else
            <a
                href="{{ route('login') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors {{ request()->routeIs('login') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-300 hover:bg-zinc-800 hover:text-brand-300' }}"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                <span>Login / Entrar</span>
            </a>
        @endauth
    </div>
</aside>

<!-- Sidebar Desktop Retrátil -->
<aside
    class="hidden md:flex flex-col shrink-0 border-r border-zinc-800 bg-zinc-900/90 transition-all duration-300 ease-in-out select-none min-h-[calc(100vh-4rem)]"
    :class="sidebarOpen ? 'w-64' : 'w-20'"
>
    <!-- Navegação Desktop -->
    <nav class="flex flex-1 flex-col gap-2 p-3">
        <!-- Link Aulas -->
        <a
            href="{{ route('lessons.index') }}"
            class="group flex items-center rounded-xl p-3 text-sm font-medium transition-all {{ request()->routeIs('lessons.index') || request()->routeIs('home') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-400 hover:bg-zinc-800/80 hover:text-zinc-100' }}"
            :class="sidebarOpen ? 'gap-3.5 justify-start' : 'justify-center'"
            title="Aulas"
        >
            <svg class="h-5 w-5 shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
            </svg>
            <span
                x-show="sidebarOpen"
                x-transition:enter="transition-opacity ease-out duration-150 delay-75"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="whitespace-nowrap"
            >
                Aulas
            </span>
        </a>

        <!-- Link Cursos -->
        <a
            href="{{ route('courses.index') }}"
            class="group flex items-center rounded-xl p-3 text-sm font-medium transition-all {{ request()->routeIs('courses.*') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-400 hover:bg-zinc-800/80 hover:text-zinc-100' }}"
            :class="sidebarOpen ? 'gap-3.5 justify-start' : 'justify-center'"
            title="Cursos"
        >
            <svg class="h-5 w-5 shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <span
                x-show="sidebarOpen"
                x-transition:enter="transition-opacity ease-out duration-150 delay-75"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="whitespace-nowrap"
            >
                Cursos
            </span>
        </a>

        <!-- Link Categorias -->
        <a
            href="{{ route('categories.index') }}"
            class="group flex items-center rounded-xl p-3 text-sm font-medium transition-all {{ request()->routeIs('categories.*') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-400 hover:bg-zinc-800/80 hover:text-zinc-100' }}"
            :class="sidebarOpen ? 'gap-3.5 justify-start' : 'justify-center'"
            title="Categorias"
        >
            <svg class="h-5 w-5 shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>
            <span
                x-show="sidebarOpen"
                x-transition:enter="transition-opacity ease-out duration-150 delay-75"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="whitespace-nowrap"
            >
                Categorias
            </span>
        </a>
    </nav>

    <!-- Rodapé da Sidebar Desktop: Login ou Logout -->
    <div class="border-t border-zinc-800 p-3">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="group w-full flex items-center rounded-xl p-3 text-sm font-medium transition-all text-zinc-400 hover:bg-zinc-800/80 hover:text-brand-300 cursor-pointer"
                    :class="sidebarOpen ? 'gap-3.5 justify-start' : 'justify-center'"
                    title="Sair da conta"
                >
                    <svg class="h-5 w-5 shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    <span
                        x-show="sidebarOpen"
                        x-transition:enter="transition-opacity ease-out duration-150 delay-75"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="whitespace-nowrap"
                    >
                        Sair
                    </span>
                </button>
            </form>
        @else
            <a
                href="{{ route('login') }}"
                class="group flex items-center rounded-xl p-3 text-sm font-medium transition-all {{ request()->routeIs('login') ? 'bg-brand/20 text-brand-300 ring-1 ring-brand-400/40' : 'text-zinc-400 hover:bg-zinc-800/80 hover:text-zinc-100' }}"
                :class="sidebarOpen ? 'gap-3.5 justify-start' : 'justify-center'"
                title="Login"
            >
                <svg class="h-5 w-5 shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                <span
                    x-show="sidebarOpen"
                    x-transition:enter="transition-opacity ease-out duration-150 delay-75"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    class="whitespace-nowrap"
                >
                    Login
                </span>
            </a>
        @endauth
    </div>
</aside>
