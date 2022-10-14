<x-app-layout>
    <h1 class="text-3xl text-center my-4">Page demande de creation d'une formation</h1>
    <form id="createFormation" action="{{route('formation.store')}}" method="post" class="flex flex-wrap justify-evenly align-center w-5/6 lg:w-1/2 m-auto">
        @csrf
        <div class="mt-2 w-full lg:w-1/2 lg:pr-3">
            <label for="name">Nom de la formation</label>
            <input class="w-full" type="text" id="name" name="name">
        </div>

        <div class="mt-2 w-full lg:w-1/2 lg:pl-3">
            <label for="reference">Reference</label>
            <input class="w-full" type="text" id="reference" name="reference">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName">

        <input type="hidden" id="assignedUserId" name="assignedUserId">

        <div class="mt-2 w-full lg:w-1/2 lg:pr-3">
            <label for="concernedPublic">Publique concerné</label>
            <textarea class="w-full" id="concernedPublic" name="concernedPublic"></textarea>
        </div>

        <div class="mt-2 w-full lg:w-1/2 lg:pl-3">
            <label for="dateAndLocation">Dates et lieux</label>
            <textarea class="w-full" id="dateAndLocation" name="dateAndLocation"></textarea>
        </div>

        <div class="mt-2 w-full lg:w-1/2 lg:pr-3">
            <label for="prerequisite">Pré-requis</label>
            <textarea class="w-full" id="prerequisite" name="prerequisite"></textarea>
        </div>

        <div class="mt-2 w-full lg:w-1/2 lg:pl-3">
            <label for="objective">Les objectifs de la formation</label>
            <textarea class="w-full" id="objective" name="objective"></textarea>
        </div>

        <div class="mt-2 w-full relative">
            <label for="trainingprogram">Programme de la formation</label>
            {{-- contenu dynamique des modules ajoutés --}}
            <div class="flex flex-wrap justify-between">
                <div class="w-full lg:w-1/2">
                    <ul class="list-disc px-5 flex flex-wrap" id="affectedModules">

                    </ul>
                </div>

                <div class="w-full lg:w-1/2 relative w-full lg:ative lg:pl-3">
                    <div id="activeModule" class="bg-lime-500 text-slate-50 text-center mb-2 py-2 px-8 rounded-full cursor-pointer w-full">
                        Ajouter
                    </div>
                    <div id="modules" class="hidden h-64 p-2 border bg-slate-50 overflow-y-scroll">
                        <input id="searchModule" class="w-full" type="text" placeholder="Rechercher">
                        @foreach ($modules as $module)
                        <div class="flex items-center justify-between my-1">
                            <span>{{$module -> id}} - {{$module -> name}}</span>
                            <span class="flex items-center">
                                <span class="checkedShowModuleInfo mx-2">
                                    <label for="{{$module->reference.'f'}}">
                                        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </label>
                                    <input class="hidden" type="radio" name="showModulef" id="{{$module->reference.'f'}}">

                                    <div class="moduleInfo shadow-md bg-slate-50 px-2 py-1 w-full lg:w-[calc(25vw-0.75rem)] absolute top-0 left-0 lg:left-3 lg:translate-x-[100%]">
                                        <h2>{{$module->name}} - {{$module->reference}}</h2>
                                        <div>
                                            {!! html_entity_decode($module->program) !!}
                                        </div>

                                        <span class="closeModal cursor-pointer font-bold">Fermer</span>
                                    </div>
                                </span>
                                <span class="addModule text-4xl cursor-pointer border rounded-full p-1 w-8 h-8 flex justify-center items-center" data-name="{{$module -> name}}" data-id="{{$module -> id}}" data-days="{{$module->durationDays}}" data-hours="{{$module->durationHours}}" data-program="{{$module->program}}" data-ref="{{$module->reference}}">+</span>
                            </span>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 w-full">
            <label for="description">Description</label>
            <input class="w-full" type="text" id="description" name="description">
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="duration_hours">Durée (heures)</label>
            <input id="resultDurationHours" type="hidden" value="" name="duration_hours">
            <div class="w-full" type="number" id="duration_hours">
            </div>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">Durée (jours)</label>
            <input id="resultDurationDays"  type="hidden" value="" name="duration_days">
            <div class="w-full" type="number" id="duration_days">
            </div>
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-8 rounded-full">
            Créer
        </button>
    </form>
    
</x-app-layout>