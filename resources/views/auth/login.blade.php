<x-layouts.app title="Entrar">
    <div class="mx-auto flex min-h-[60vh] max-w-md flex-col justify-center py-12">
        <div class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-8 shadow-xl">
            <div class="text-center mb-6">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-tr from-red-600 to-rose-500 shadow-lg shadow-red-500/25 mb-4">
                    <svg class="h-6 w-6 fill-white" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold tracking-tight text-white">Acesse o Clube Full-Stack</h2>
                <p class="text-xs text-zinc-400 mt-1">Entre com seu e-mail e senha para continuar</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-medium text-zinc-300 mb-1.5">E-mail</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', 'admin@clubefullstack.com') }}"
                        required
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                        placeholder="seu@email.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-xs font-medium text-zinc-300 mb-1.5">Senha</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        value="password"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    >
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-zinc-400 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-zinc-700 bg-zinc-950 text-red-600 focus:ring-red-500">
                        <span>Lembrar de mim</span>
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-red-600 py-2.5 text-sm font-semibold text-white shadow-md shadow-red-600/20 hover:bg-red-500 active:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-zinc-950"
                >
                    Entrar
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
