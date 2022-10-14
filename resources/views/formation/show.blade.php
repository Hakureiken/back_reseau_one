<x-app-layout>
    <div class="hidden text-green-500 bg-green-500"></div>
    <div id="showFormation" class="relative w-5/6 m-auto flex flex-col">
        <form class="order-1 lg:absolute lg:right-0 mt-10 p-2 w-full lg:w-[42vw] bg-slate-50 flex flex-wrap" action="{{route('contact_form.store')}}" method="post">
            @csrf
            <h2 class="w-full text-neutral-700 text-center text-3xl">Informations de l'entreprise</h2>
            <p class="w-full text-center"><span class="text-red-500">Texte en rouge obligatoire à remplir</span><span class="text-neutral-700"> | texte en noir facultatif</span></p>
            <input type="hidden" name="reference" value="{{$formation->reference}}">
            <div class="w-full flex items-center flex-col lg:flex-row pr-2 pt-1">
                <x-jet-label class="text-center text-red-500 text-xl w-[200px]" for="name" value="{{ __('Nom de la structure') }}" />
                <x-jet-input id="name" class="w-full lg:w-[calc(100%-200px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="name" required/>
            </div>
            <div class="w-full lg:w-7/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-red-500 text-xl w-[70px]" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="w-full lg:w-[calc(100%-70px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="email" required/>
            </div>
            <div class="w-full lg:w-5/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-red-500 text-xl w-[120px]" for="telephone" value="{{ __('Téléphone') }}" />
                <x-jet-input id="telephone" class="w-full lg:w-[calc(100%-120px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="telephone" required/>
            </div>
            <div class="w-full lg:w-2/5 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-red-500 text-xl w-[70px]" for="siret" value="{{ __('SIRET') }}" />
                <x-jet-input id="siret" class="w-full lg:w-[calc(100%-70px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="siret" required/>
            </div>
            <div class="w-full lg:w-3/5 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[150px]" for="codeApeNaf" value="{{ __('Code APE/NAF') }}" />
                <x-jet-input id="codeApeNaf" class="w-full lg:w-[calc(100%-150px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="codeApeNaf"/>
            </div>
            <div class="w-full flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[100px]" for="adress" value="{{ __('Adress') }}" />
                <x-jet-input id="adress" class="w-full lg:w-[calc(100%-100px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="adress"/>
            </div>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[120px]" for="codePostal" value="{{ __('Code postal') }}" />
                <x-jet-input id="codePostal" class="w-full lg:w-[calc(100%-120px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="codePostal"/>
            </div>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[50px]" for="city" value="{{ __('Ville') }}" />
                <x-jet-input id="city" class="w-full lg:w-[calc(100%-50px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="city"/>
            </div>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[120px]" for="numTVA" value="{{ __('Numero TVA') }}" />
                <x-jet-input id="numTVA" class="w-full lg:w-[calc(100%-120px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="numTVA"/>
            </div>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[120px]" for="opcoOpca" value="{{ __('OPCO/OPCA') }}" />
                <x-jet-input id="opcoOpca" class="w-full lg:w-[calc(100%-120px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="opcoOpca"/>
            </div>
            <div class="w-full lg:w-5/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[70px]" for="idcc" value="{{ __('IDCC') }}" />
                <x-jet-input id="idcc" class="w-full lg:w-[calc(100%-70px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="idcc"/>
            </div>
            <div class="w-full lg:w-7/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[200px]" for="numSalaries" value="{{ __('Nombre de salarié(e)s') }}" />
                <x-jet-input id="numSalaries" class="w-full lg:w-[calc(100%-200px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="numSalaries"/>
            </div>

            <hr class="w-full my-2">

            <div class="w-full">
                <x-jet-label class="text-center text-neutral-700 text-xl " for="content" value="{{ __('Écrivez votre/vos question(s)') }}" />
                <textarea class="w-full" name="content" id="content" rows="5"></textarea>
            </div>

            <hr class="w-full my-2">

            <h2 class="w-full text-neutral-700 text-center text-3xl">Informations sur vous</h2>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[90px]" for="first_name" value="{{ __('Prénom') }}" />
                <x-jet-input id="first_name" class="w-full lg:w-[calc(100%-90px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="first_name" value="{{Auth::user() -> first_name}}"/>
            </div>
            <div class="w-full lg:w-1/2 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[60px]" for="last_name" value="{{ __('Nom') }}" />
                <x-jet-input id="last_name" class="w-full lg:w-[calc(100%-60px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="last_name" value="{{Auth::user() -> last_name}}" required/>
            </div>
            <div class="w-full lg:w-full flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[110px]" for="poste" value="{{ __('Titre/Poste') }}" />
                <x-jet-input id="poste" class="w-full lg:w-[calc(100%-110px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="poste" value="{{Auth::user() -> poste}}" required/>
            </div>
            <div class="w-full lg:w-7/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[70px]" for="emailUser" value="{{ __('Email') }}" />
                <x-jet-input id="emailUser" class="w-full lg:w-[calc(100%-70px)] text-neutral-800 pl-2 lg:pl-4 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="emailUser" value="{{Auth::user() -> email}}" required/>
            </div>
            <div class="w-full lg:w-5/12 flex items-center flex-col lg:flex-row pr-2 pt-1 pr-2">
                <x-jet-label class="text-center text-neutral-700 text-xl w-[110px]" for="telephoneUser" value="{{ __('Téléphone') }}" />
                <x-jet-input id="telephoneUser" class="w-full lg:w-[calc(100%-110px)] text-neutral-800 pl-2 h-9 rounded-xl my-4 mx-0 border-none" type="text" name="telephoneUser" value="{{Auth::user() -> telephone}}" required/>
            </div>

            <button id="buttonValidate" class="bg-red-500 text-slate-50 py-2 px-4 m-auto rounded-full" type="submit" disabled>Envoyer</button>
        </form>
        
        <h1 class="text-3xl text-center">
            {{$formation -> name}} - {{$formation -> reference}}
        </h1>

        <div>
            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Programme de la formation : </h2>
                <ul class="list-disc px-5 flex flex-wrap" id="affectedModules">
                    @foreach (json_decode($formation -> trainingprogram) as $module_id)
                        @foreach ($modules as $module)
                            
                            @if ($module_id == $module -> id)
                            
                            <li class='formationModule flex w-full justify-between'>
                                {{$module -> name}} - {{$module -> reference}}
                            </li>
                            @endif
                        @endforeach
                        
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Objectifs de la formation : </h2>
                {{$formation -> objective}}
            </div>

            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Publique concerné : </h2>
                {{$formation -> concernedPublic}}
            </div>

            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Pré-requis : </h2>
                {{$formation -> prerequisite}}
            </div>

            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Méthode pédagogique : </h2>
                {{$formation -> teachingMethod}}
            </div>

            <div class="my-3">
                <span class="border rounded-full bg-green-400 text-white py-2 px-4">{{$formation -> duration_hours}} heures</span>
                <span class="border rounded-full bg-green-400 text-white py-2 px-4">{{$formation -> duration_days}} jours</span>
            </div>
        </div>
        @admin
        <div class="flex my-3">
            <a class="bg-purple-600 text-white py-2 px-4 rounded-full mr-2" href="{{route('formation.edit', $formation -> laraRef )}}">Modifier</a>
            <form action="{{route('formation.destroy', $formation -> id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-slate-50 py-2 px-4 rounded-full" type="submit">Supprimer</button>
            </form>
        </div>
        @endadmin
    </div>
    
</x-app-layout>