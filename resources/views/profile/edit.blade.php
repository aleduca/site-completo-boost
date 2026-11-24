<x-layouts.app title="Editar Perfil">
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
            <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-white">Editar Perfil</h2>
            <p class="text-xs sm:text-sm text-zinc-400 mt-1">Atualize seus dados cadastrais e foto de perfil</p>
        </div>

        <!-- Flash Message de Sucesso -->
        @if (session('success'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-3.5 text-xs sm:text-sm text-emerald-400">
                <svg class="h-5 w-5 shrink-0 text-emerald-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                <div class="leading-relaxed">
                    <strong class="font-semibold block">Sucesso:</strong>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

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

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- CARD 1: Dados da Conta (name, email, password) -->
            <div class="rounded-2xl border border-zinc-800 bg-zinc-900/90 p-6 sm:p-8 shadow-xl space-y-4">
                <div class="border-b border-zinc-800 pb-3">
                    <h3 class="text-sm font-semibold text-zinc-200 flex items-center gap-2">
                        <svg class="h-4 w-4 text-brand-300" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span>Informações da Conta</span>
                    </h3>
                    <p class="text-xs text-zinc-500 mt-0.5">Atualize seu nome e e-mail de acesso</p>
                </div>

                <!-- Campo Name (preenchido com dados atuais) -->
                <div>
                    <label for="name" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        Nome Completo <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                        placeholder="Ex: Alexandre Santos"
                        class="w-full rounded-xl border @error('name') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Email (preenchido com dados atuais) -->
                <div>
                    <label for="email" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        E-mail <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        placeholder="seu@email.com"
                        class="w-full rounded-xl border @error('email') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Password (vazio por segurança, opcional no update) -->
                <div>
                    <label for="password" class="block text-xs font-medium text-zinc-300 mb-1.5">
                        Nova Senha
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Deixe em branco para manter a atual"
                        class="w-full rounded-xl border @error('password') border-red-500 ring-1 ring-red-500 @else border-zinc-700 @enderror bg-zinc-950 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand transition-colors"
                    >
                    <p class="mt-1 text-[11px] text-zinc-500">Deixe em branco caso não queira alterar sua senha atual.</p>
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- CARD 2: Upload do Avatar (Com preview do avatar atual se existir) -->
            <div
                x-data="{
                    avatarPreview: '{{ $user->avatar ? asset('storage/' . $user->avatar->path) : '' }}',
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
                            Independente
                        </span>
                    </div>
                    <p class="text-xs text-zinc-400 mt-1">Você pode atualizar seu avatar independentemente das informações de cadastro</p>
                </div>

                <!-- Campo de Upload do Avatar com Exibição da Foto Atual -->
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <!-- Preview do Avatar (Mostra o avatar atual ou a nova imagem selecionada) -->
                    <div class="relative shrink-0">
                        <template x-if="avatarPreview">
                            <div class="relative">
                                <img
                                    :src="avatarPreview"
                                    alt="Foto de perfil"
                                    class="h-20 w-20 rounded-2xl object-cover ring-2 ring-brand-500/50 shadow-md"
                                >
                                @if ($user->avatar)
                                    <span
                                        x-show="avatarPreview === '{{ asset('storage/' . $user->avatar->path) }}'"
                                        class="absolute -top-1.5 -right-1.5 flex h-5 w-5 items-center justify-center rounded-full bg-emerald-500 text-[10px] text-white shadow"
                                        title="Avatar atual cadastrado"
                                    >
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
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
                            <span class="text-xs font-semibold text-zinc-200">
                                @if ($user->avatar)
                                    Clique para escolher uma nova foto
                                @else
                                    Clique para selecionar uma foto
                                @endif
                            </span>
                            <span class="text-[11px] text-zinc-500 mt-0.5">Apenas .png, .jpg ou .jpeg (máx. 2MB)</span>
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

            <!-- Informação de Independência dos Formulários -->
            <div class="rounded-xl border border-zinc-800 bg-zinc-950/60 p-3.5 text-xs text-zinc-400 flex items-start gap-2.5">
                <svg class="h-4 w-4 shrink-0 text-brand-300 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                <span>
                    Você pode alterar somente o avatar, somente suas informações pessoais (nome, e-mail, senha) ou ambos juntos.
                </span>
            </div>

            <!-- Botão de Envio (Visual, ação de update será implementada futuramente) -->
            <button
                type="submit"
                class="w-full rounded-xl bg-brand py-2.5 text-sm font-semibold text-white shadow-md shadow-brand/25 hover:bg-brand-600 active:bg-brand-800 transition-colors focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 focus:ring-offset-zinc-950"
            >
                Salvar Alterações
            </button>

            <!-- Link para Voltar -->
            <div class="text-center pt-1">
                <a href="{{ route('home') }}" class="text-xs text-zinc-400 hover:text-zinc-200 transition-colors">
                    &larr; Voltar para a página inicial
                </a>
            </div>
        </form>
    </div>
</x-layouts.app>
