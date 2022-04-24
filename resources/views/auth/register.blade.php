<x-guest-layout>
    <div class="flex flex-row h-full" id="auth-card">
        <div name="logo" class="w-1/2 flex justify-center items-center">
            <a class="w-3/5" href="/">
                <img src="{{ url('avalia-vale-logo.png') }}">
            </a>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-1/2 flex flex-col justify-center items-center">
            <h1 id="login-title" class="mb-14">Crie um perfil</h1>
            <form class="w-full" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="flex justify-center">
                    <x-input
                        id="name"
                        class="block mt-1 w-3/4"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        :placeholder="__('Nome')"
                    />
                </div>

                <!-- Email Address -->
                <div class="flex justify-center mt-4">
                    <x-input
                        id="email"
                        class="block mt-1 w-3/4"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        :placeholder="__('Email')"
                    />
                </div>

                <!-- Password -->
                <div class="flex justify-center mt-4">
                    <x-input
                        id="password"
                        class="block mt-1 w-3/4"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        :placeholder="__('Senha')"
                    />
                </div>

                <div class="flex items-center justify-center flex-col mt-12">
                    <button id="auth-button" class="w-3/4">
                        {{ __('Criar um perfil') }}
                    </button>

                    <a id="auth-link" class="mt-3 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Já tem um perfil? Faça o login?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
