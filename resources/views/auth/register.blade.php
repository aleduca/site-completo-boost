<x-layouts.app title="Cadastro de Usuário">
    <div class="mx-auto flex min-h-[60vh] max-w-lg flex-col justify-center py-8 sm:py-12">
        <!-- Cabeçalho -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-block bg-transparent mb-3">
                <img
                    src="{{ asset('logo/logo.png') }}"
                    alt="Clube Full-Stack"
                    class="h-12 sm:h-14 w-auto object-contain bg-transparent mx-auto transition-transform duration-200 hover:scale-105"
                >
            </a>
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Crie sua Conta no Clube Full-Stack</h2>
            <p class="text-xs sm:text-sm text-zinc-400 mt-1">Preencha seus dados para começar a estudar</p>
        </div>

        <!-- Flash Message de Erro -->
        @if (session('error'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-500/30 bg-red-500/10 p-3.5 text-xs sm:text-sm text-red-400">
                <svg class="h-5 w-5 shrink-0 text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <div class="leading-relaxed">
                    <strong class="font-semibold block">Erro:</strong>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- CARD 1: Dados Obrigatórios da Conta (name, email, password) -->
            <div class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-6 sm:p-8 shadow-xl space-y-4">
                <div class="border-b border-zinc-800 pb-3">
                    <h3 class="text-sm font-semibold text-zinc-200 flex items-center gap-2">
                        <svg class="h-4 w-4 text-brand-300" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span>Informações da Conta</span>
                    </h3>
                    <p class="text-xs text-zinc-500 mt-0.5">Campos obrigatórios para criar seu acesso</p>
                </div>

                <!-- Campo Name -->
                <div>
                    <label for="name" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        Nome Completo <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        placeholder="Ex: Alexandre Santos"
                        class="w-full rounded-xl border @error('name') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div>
                    <label for="email" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        E-mail <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="seu@email.com"
                        class="w-full rounded-xl border @error('email') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Password -->
                <div>
                    <label for="password" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        Senha <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Mínimo de 6 caracteres"
                        class="w-full rounded-xl border @error('password') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- CARD 2: Upload do Avatar (Opcional - Separado logo abaixo) -->
            <div
                x-data="{
                    avatarPreview: null,
                    handleFileSelect(event) {
                        const file = event.target.files[0];
                        if (file) {
                            this.avatarPreview = URL.createObjectURL(file);
                        }
                    }
                }"
                class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-6 sm:p-8 shadow-xl space-y-4"
            >
                <div class="border-b border-zinc-800 pb-3">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-zinc-200 flex items-center gap-2">
                            <svg class="h-4 w-4 text-brand-300" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span>Foto de Perfil</span>
                        </h3>
                        <span class="rounded-full bg-zinc-800 px-2 py-0.5 text-[10px] font-medium text-zinc-400 border border-zinc-700/60">
                            Opcional
                        </span>
                    </div>
                    <p class="text-xs text-zinc-400 mt-1">O avatar é opcional e você também poderá enviá-lo depois no seu perfil</p>
                </div>

                <!-- Campo de Upload do Avatar -->
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <!-- Preview do Avatar -->
                    <div class="relative shrink-0">
                        <template x-if="avatarPreview">
                            <img
                                :src="avatarPreview"
                                alt="Preview do avatar"
                                class="h-20 w-20 rounded-2xl object-cover ring-2 ring-brand-500/50"
                            >
                        </template>
                        <template x-if="!avatarPreview">
                            <div class="flex h-20 w-20 items-center justify-center rounded-2xl border-2 border-dashed border-zinc-700 bg-zinc-950 text-zinc-500">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </template>
                    </div>

                    <!-- Dropzone / Input de Arquivo -->
                    <div class="w-full flex-1">
                        <label
                            for="avatar"
                            class="flex flex-col items-center justify-center rounded-xl border border-dashed border-zinc-700 bg-zinc-950 p-4 text-center cursor-pointer hover:border-brand-500 hover:bg-brand/5 transition-all"
                        >
                            <svg class="h-6 w-6 text-brand-300 mb-1" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            <span class="text-xs font-semibold text-zinc-200">Clique para selecionar uma foto</span>
                            <span class="text-[11px] text-zinc-500 mt-0.5">Apenas .png, .jpg ou .jpeg (opcional, máx. 2MB)</span>
                            <input
                                type="file"
                                id="avatar"
                                name="avatar"
                                accept=".png,.jpeg,.jpg,image/png,image/jpeg"
                                @change="handleFileSelect"
                                class="sr-only"
                            >
                        </label>
                        @error('avatar')
                            <p class="mt-2 text-xs text-red-400 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Botão de Envio do Formulário -->
            <button
                type="submit"
                class="w-full rounded-xl bg-brand py-2.5 text-sm font-semibold text-white shadow-md shadow-brand/25 hover:bg-brand-600 active:bg-brand-800 transition-colors focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 focus:ring-offset-zinc-950"
            >
                Criar Minha Conta
            </button>

            <!-- Link para Login -->
            <div class="text-center pt-2">
                <p class="text-xs text-zinc-400">
                    Já possui uma conta?
                    <a href="{{ route('login') }}" class="font-semibold text-brand-300 hover:text-brand-200 hover:underline transition-colors">
                        Fazer login
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-layouts.app>
