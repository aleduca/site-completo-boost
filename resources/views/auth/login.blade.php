<x-layouts.app title="Entrar">
    <div class="mx-auto flex min-h-[60vh] max-w-md flex-col justify-center py-8 sm:py-12">
        <div class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-6 sm:p-8 shadow-xl">
            <!-- Cabeçalho do Card com Logo sem cor de background -->
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="inline-block bg-transparent mb-3">
                    <img
                        src="{{ asset('logo/logo.png') }}"
                        alt="Clube Full-Stack"
                        class="h-12 sm:h-14 w-auto object-contain bg-transparent mx-auto transition-transform duration-200 hover:scale-105"
                    >
                </a>
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Acesse o Clube Full-Stack</h2>
                <p class="text-xs sm:text-sm text-zinc-400 mt-1">Entre com seu e-mail e senha para continuar</p>
            </div>

            <!-- Flash Message de Erro -->
            @if (session('error'))
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-500/30 bg-red-500/10 p-3.5 text-xs sm:text-sm text-red-400">
                    <svg class="h-5 w-5 shrink-0 text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <div class="leading-relaxed">
                        <strong class="font-semibold block">Erro de autenticação:</strong>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Flash Message de Sucesso -->
            @if (session('success'))
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-3.5 text-xs sm:text-sm text-emerald-400">
                    <svg class="h-5 w-5 shrink-0 text-emerald-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Campo E-mail -->
                <div>
                    <label for="email" class="block text-xs font-medium text-zinc-300 mb-1.5">E-mail</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', 'admin@clubefullstack.com') }}"
                        required
                        autofocus
                        class="w-full rounded-xl border @error('email') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                        placeholder="seu@email.com"
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Senha -->
                <div>
                    <label for="password" class="block text-xs font-medium text-zinc-300 mb-1.5">Senha</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        value="password"
                        class="w-full rounded-xl border @error('password') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                        placeholder="Sua senha"
                    >
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lembrar de mim -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-zinc-400 cursor-pointer select-none">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-zinc-700 bg-zinc-950 text-brand focus:ring-brand focus:ring-offset-zinc-900"
                        >
                        <span>Lembrar de mim</span>
                    </label>
                    <span class="text-zinc-500">Padrão: <strong class="text-zinc-300 font-normal">password</strong></span>
                </div>

                <!-- Botão de Ação -->
                <button
                    type="submit"
                    class="w-full rounded-xl bg-brand py-2.5 text-sm font-semibold text-white shadow-md shadow-brand/25 hover:bg-brand-600 active:bg-brand-800 transition-colors focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 focus:ring-offset-zinc-950"
                >
                    Entrar na Plataforma
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
