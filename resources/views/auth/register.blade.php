<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <h2 class="my-6 text-5xl">S&#x27;enregistrer</h2>
        <form id="register" class="w-4/5 lg:w-full flex justify-around flex-col lg:flex-row flex-wrap" method="POST" action="{{ route('register.store') }}">
            @csrf
            {{-- entreprise --}}
            <div class="w-full lg:w-2/5 ">
                <h3 class="text-center text-slate-50 text-3xl mb-4">Votre Entreprise</h3>
                <h3>Si votre entreprise n'est pas française merci de nous contacter à cette adresse : <a class="underline" href="#">contact@contact.com</a></h3>
                <p id="errorMsg" class="text-red-500 mb-3"></p>
                <div class="w-full flex justify-between flex-wrap">
                    <div class="w-full flex flex-wrap">

                        <div class="w-full lg:w-3/5 lg:pr-2">
                            <x-jet-label class="text-slate-50 text-xl" for="siret" value="{{ __('Merci de préciser votre SIRET') }}" />
                            <x-jet-input id="siret" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="siret" :value="old('siret')" required />
                        </div>

                        <div class="w-full lg:w-2/5 lg:pl-2">
                            <x-jet-label class="text-slate-50 text-xl" for="numSalaries" value="{{ __('Nombre de salarié') }}" />
                            <x-jet-input id="numSalaries" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="numSalaries" :value="old('numSalaries')" required />
                        </div>
                    </div>

                    <input type="hidden" name="organization_id" value="1">

                    <div class="w-full flex flex-wrap">

                        <div class="w-full lg:w-1/2 lg:pr-2">
                            <x-jet-label class="text-slate-50 text-xl" for="codeAPENAF" value="{{ __('Précisez votre Code APE/NAF') }}" />
                            <x-jet-input id="codeAPENAF" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="codeAPENAF" :value="old('codeAPENAF')" required />
                        </div>

                        <div class="w-full lg:w-1/2 lg:pl-2">
                            <x-jet-label class="text-slate-50 text-xl" for="numTVA" value="{{ __('Précisez votre numéro TVA') }}" />
                            <x-jet-input id="numTVA" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="numTVA" :value="old('numTVA')" required />
                        </div>
                    </div>

                    <div class="w-full flex flex-wrap">

                        <div class="w-full lg:w-3/5 lg:pr-2">
                            <x-jet-label class="text-slate-50 text-xl" for="opcoOpca" value="{{ __('Précisez votre OPCO/OPCA') }}" />
                            <x-jet-input id="opcoOpca" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="opcoOpca" :value="old('opcoOpca')" required />
                        </div>

                        <div class="w-full lg:w-2/5 lg:pl-2">
                            <x-jet-label class="text-slate-50 text-xl" for="idcc" value="{{ __('Précisez votre IDCC') }}" />
                            <x-jet-input id="idcc" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="idcc" :value="old('idcc')" required />
                        </div>
                    </div>

                    <div class="w-full hidden">
                        <x-jet-label class="text-slate-50 text-xl" for="denominationUniteLegale" value="{{ __('Ville de l entreprise') }}" />
                        <x-jet-input id="denominationUniteLegale" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="denominationUniteLegale" :value="old('denominationUniteLegale')" />
                    </div>
                    
                    <div class="w-full hidden flex justify-between flex-wrap">
                        <div class="w-8/12">
                            <x-jet-label class="text-slate-50 text-xl" for="libelleCommuneEtablissement" value="{{ __('Nom de l entreprise') }}" />
                            <x-jet-input id="libelleCommuneEtablissement" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="libelleCommuneEtablissement" :value="old('libelleCommuneEtablissement')" />
                        </div>
                        <div class="w-3/12">
                            <x-jet-label class="text-slate-50 text-xl" for="postalCodeEtablissement" value="{{ __('CP l entreprise') }}" />
                            <x-jet-input id="postalCodeEtablissement" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="postalCodeEtablissement" :value="old('postalCodeEtablissement')" />
                        </div>
                    </div>
                    
                    <div class="w-full hidden flex justify-between">
                        <div class="w-2/12">
                            <x-jet-label class="text-slate-50 text-xl" for="numVoieEtablissement" value="{{ __('Numero') }}" />
                            <x-jet-input id="numVoieEtablissement" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="numVoieEtablissement" :value="old('numVoieEtablissement')" />
                        </div>
                        <div class="w-2/12">
                            <x-jet-label class="text-slate-50 text-xl" for="typeVoieEtablissement" value="{{ __('Type') }}" />
                            <x-jet-input id="typeVoieEtablissement" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="typeVoieEtablissement" :value="old('typeVoieEtablissement')" />
                        </div>
                        <div class="w-6/12">
                            <x-jet-label class="text-slate-50 text-xl" for="libelleVoieEtablissement" value="{{ __('Libellé') }}" />
                            <x-jet-input id="libelleVoieEtablissement" class="w-full text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="libelleVoieEtablissement" :value="old('libelleVoieEtablissement')" />
                        </div>
                    </div>

                </div>
            </div>

            {{-- person --}}
            <div class="w-full lg:w-2/5 ">
                <h3 class="text-center text-slate-50 text-3xl mb-4">Vous</h3>
                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="first_name" value="{{ __('Merci de préciser votre prénom') }}" />
                    <x-jet-input id="first_name" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="first_name" :value="old('first_name')" required />
                </div>
    
                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="last_name" value="{{ __('Merci de préciser votre nom') }}" />
                    <x-jet-input id="last_name" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="last_name" :value="old('last_name')" required />
                </div>
    
                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="email" value="{{ __('Merci de préciser votre courriel') }}" />
                    <x-jet-input id="email" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="email" name="email" value="{{ $_GET ? $_GET['email'] : old('email')}}" required />
                </div>
                
                <div class="flex flex-wrap justify-between">
                    <x-jet-label class="mb-2 text-xl text-slate-50 w-full" for="" value="{{ __('Selectionnez les lieux ou vous pouvez aller') }}" />
                    @foreach ($regions as $key => $region)
                        <div class="regions w-full lg:w-1/2 text-center lg:text-start ">
                            <label class="flex flex-col items-center">
                                <span class="mr-2 cursor-pointer hover:underline">{{$region}}</span>
                                <input class="hidden region" type="checkbox" />
                                @foreach ($departements as $departement)
                                    @if ($departement -> region -> nom === $region)
                                        <div class="w-64 lg:w-auto departements hidden items-center justify-between flex-row-reverse lg:flex-row lg:justify-start">
                                            <input type="checkbox" id="{{$departement->nom}}" name="mobilityDepartment[]"/>
                                            <label class="ml-2" for="{{$departement->nom}}">{{$departement -> nom}} - {{$departement -> code}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </label>
                        </div>
                    @endforeach
                </div>
    
                <div class="flex flex-wrap mt-4">
                    <div class="w-full lg:w-3/5">
                        <x-jet-label class="text-slate-50 text-xl" for="telephone" value="{{ __('Numéro de téléphone') }}" />
                        <x-jet-input id="telephone" class="text-neutral-800 pl-2 w-full lg:w-5/6 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="telephone" required/>
                    </div>
                    <div class="w-full lg:w-2/5 my-1 flex flex-wrap justify-between">
                        <x-jet-label class="text-slate-50 text-xl w-full" value="{{ __('Civilité') }}" />

                        <div class="flex items-center">
                            <input type="radio" name="gender" id="women" />
                            <x-jet-label class="ml-2 text-slate-50 text-xl" for="women" value="{{ __('Femme') }}" />
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="gender" id="men" />
                            <x-jet-label class="ml-2 text-slate-50 text-xl" for="men" value="{{ __('Homme') }}" />
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="gender" id="other" checked />
                            <x-jet-label class="ml-2 text-slate-50 text-xl" for="other" value="{{ __('Autre') }}"/>
                        </div>

                    </div>
                </div>

                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="poste" value="{{ __('Votre poste') }}" />
                    <x-jet-input id="poste" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="text" name="poste" required />
                </div>

                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="password" value="{{ __('Entrez votre mot de passe') }}" />
                    <x-jet-input id="password" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="password" name="password" required autocomplete="current-password" />
                </div>
    
                <div class="flex flex-col">
                    <x-jet-label class="text-slate-50 text-xl" for="password_confirmation" value="{{ __('Confirmez votre mot de passe') }}" />
                    <x-jet-input id="password_confirmation" class="text-neutral-800 pl-2 lg:pl-4 h-11 rounded-xl my-4 mx-0 border-none" type="password" name="password_confirmation" required autocomplete="current-password" />
                </div>
    
            </div>
            <x-jet-button class="w-full lg:w-11/12 border-none rounded-xl my-6 bg-neutral-600 text-slate-50 h-14 text-xl cursor-pointer">
                {{ __('S\'enregistrer') }}
            </x-jet-button>
            
        </form>

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
        <a class="text-xl hover:underline flex justify-center items-center my-4" href="{{ route('login') }}">
            {{ __('Déjà enregistré?') }}
        </a>
    </x-jet-authentication-card>
</x-guest-layout>
