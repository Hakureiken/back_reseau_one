<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="w-10/12 lg:w-2/5 flex flex-col" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="my-6 text-5xl">Connexion</h2>

            <div class="flex flex-col">
                <x-jet-label class="text-slate-50" for="email" value="{{ __('Merci de préciser votre courriel') }}" />
                <x-jet-input id="email" class="pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex flex-col mt-4">
                <x-jet-label class="text-slate-50" for="password" value="{{ __('Entrez votre mot de passe') }}" />
                <x-jet-input id="password" class="pl-4 h-11 rounded-xl my-4 mx-0 border-none text-black" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- à garder? --}}
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-slate-50">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <x-jet-button class="border-none rounded-xl my-6 bg-neutral-600 text-slate-50 h-14 text-xl cursor-pointer">
                {{ __('Se connecter') }}
            </x-jet-button>

            <hr>
            
        </form>
        <div class="mt-4">
            Pas de compte ? <strong><a class="hover:underline" href="/register">Inscrivez-vous</a></strong>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
