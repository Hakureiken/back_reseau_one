<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form class="w-5/6 lg:w-2/5 flex flex-col" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="my-6 text-5xl">S&#x27;enregistrer</h2>

            <div class="flex flex-col">
                <x-jet-label class="text-slate-50" for="email" value="{{ __('Merci de préciser votre courriel') }}" />
                <x-jet-input id="email" class="text-neutral-800 pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex flex-col mt-4">
                <x-jet-label class="text-slate-50" for="password" value="{{ __('Entrez votre mot de passe') }}" />
                <x-jet-input id="password" class="text-neutral-800 pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="password" name="password" required autocomplete="current-password" />
            </div>

            <x-jet-button class="border-none rounded-xl my-6 bg-neutral-600 text-slate-50 h-14 text-xl cursor-pointer">
                {{ __('S\'enregistrer') }}
            </x-jet-button>

            <hr>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex justify-center items-center mt-4">
                <a class="text-sm hover:underline" href="{{ route('login') }}">
                    {{ __('Déjà enregistré?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('S\'enregistrer') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>