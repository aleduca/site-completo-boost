<x-layouts.app title="Entrar no Clube Full-Stack">
    <div class="mx-auto flex min-h-[65vh] max-w-md flex-col justify-center py-8 sm:py-12">
        <div class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-6 sm:p-8 shadow-2xl backdrop-blur-sm">
            <!-- Cabeçalho do formulário -->
            <div class="text-center mb-6">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-brand to-brand-500 shadow-lg shadow-brand/30 ring-1 ring-brand-400/40 mb-4">
                    <svg class="h-7 w-7 fill-white" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Acesse sua Conta</h2>
                <p class="text-xs sm:text-sm text-zinc-400 mt-1">Insira suas credenciais para gerenciar e acompanhar as aulas</p>
            </div>

            <!-- Flash Message de ERRO -->
            @if (session('error'))
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-xs sm:text-sm text-red-300 shadow-sm" role="alert">
                    <svg class="h-5 w-5 shrink-0 text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <div class="flex-1">
                        <strong class="font-semibold text-red-200">Falha na autenticação:</strong>
                        <p class="mt-0.5">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Flash Message de STATUS / SUCESSO -->
            @if (session('status'))
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-xs sm:text-sm text-emerald-300 shadow-sm" role="status">
                    <svg class="h-5 w-5 shrink-0 text-emerald-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div class="flex-1">
                        <p class="font-medium">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <!-- Formulário de Login -->
            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Campo E-mail -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-zinc-300 mb-1.5">
                        E-mail
                    </label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-zinc-500">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full rounded-xl border {{ $errors->has('email') ? 'border-red-500 ring-1 ring-red-500' : 'border-zinc-700/80' }} bg-zinc-950/80 pl-10 pr-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand-400 focus:outline-none focus:ring-1 focus:ring-brand-400 transition-colors"
                            placeholder="exemplo@clubefullstack.com"
                        >
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Senha -->
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-zinc-300 mb-1.5">
                        Senha
                    </label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-zinc-500">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full rounded-xl border {{ $errors->has('password') ? 'border-red-500 ring-1 ring-red-500' : 'border-zinc-700/80' }} bg-zinc-950/80 pl-10 pr-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand-400 focus:outline-none focus:ring-1 focus:ring-brand-400 transition-colors"
                            placeholder="••••••••"
                        >
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lembrar de mim -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-zinc-400 cursor-pointer select-none">
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            class="h-4 w-4 rounded border-zinc-700 bg-zinc-950 text-brand focus:ring-brand-400 focus:ring-offset-zinc-900"
                        >
                        <span>Lembrar de mim</span>
                    </label>
                </div>

                <!-- Botão Entrar -->
                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-brand py-2.5 text-sm font-semibold text-white shadow-md shadow-brand/30 ring-1 ring-brand-400/40 hover:bg-brand-600 active:bg-brand-800 transition-all focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 focus:ring-offset-zinc-950 cursor-pointer"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span>Entrar na Plataforma</span>
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
