@auth
@if (Auth::user()-> role > 90 || Auth::user() -> name == $formation -> assignedUserName)

<x-app-layout>

    <h1 class="text-3xl text-center my-4">Page demande de creation d'une formation</h1>
    <form id="editFormation" action="{{route('formation.update', $formation -> laraRef)}}" method="post" class="flex flex-wrap justify-evenly align-center w-1/2 m-auto">
        @csrf
        @method('PATCH')
        <div class="mt-2 w-1/2 pr-3">
            <label for="name">Nom de la formation</label>
            <input class="w-full" type="text" id="name" name="name" value="{{$formation -> name}}">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="reference">Reference</label>
            <input class="w-full" type="text" id="reference" name="reference" value="{{$formation -> reference}}">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName" value="{{$formation -> assignedUserName}}">

        <input type="hidden" id="assignedUserId" name="assignedUserId" value="{{$formation -> assignedUserId}}">

        <div class="mt-2 w-1/2 pr-3">
            <label for="concernedPublic">Publique concerné</label>
            <textarea class="w-full" id="concernedPublic" name="concernedPublic">{{$formation -> concernedPublic}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="dateAndLocation">Dates et lieux</label>
            <textarea class="w-full" id="dateAndLocation" name="dateAndLocation">{{$formation -> dateAndLocation}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="prerequisite">Pré-requis</label>
            <textarea class="w-full" id="prerequisite" name="prerequisite">{{$formation -> prerequisite}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="objective">Les objectifs de la formation</label>
            <textarea class="w-full" id="objective" name="objective">{{$formation -> objective}}</textarea>
        </div>

        <div class="mt-2 w-full relative">
            <label for="trainingprogram">Programme de la formation</label>
            {{-- contenu dynamique des modules ajoutés --}}
            <div class="flex justify-between">
                <div class="w-1/2">
                    <ul class="list-disc px-5 flex flex-wrap" id="affectedModules">
                        @foreach (json_decode($formation -> trainingprogram) as $module_id)
                            @foreach ($modules as $module)
                                @if ($module_id == $module -> id)
                                    <li data-order="{{$count++}}" data-module-id={{$module -> id}} data-hours="{{$module->durationHours}}" data-days="{{$module->durationDays}}"class='formationModule px-2 flex w-full justify-between'>{{$module -> name}}
                                        <input type="hidden" value="{{$module -> id}}" name="module_id[]">
                                        <div class="flex items-center">
                                            <span class="up cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                                </svg>
                                            </span>

                                            <span class="down cursor-pointer my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                                </svg>
                                            </span>

                                            <span class="checkedShowModuleInfo">
                                                <label for="{{$module->reference}}">
                                                    <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                    </svg>
                                                </label>
                                                <input class="hidden" type="radio" name="showModule" id="{{$module->reference}}">

                                                <div class="moduleInfo z-10 shadow-md bg-slate-50 px-2 py-1 w-[calc(25vw-0.75rem)] absolute top-0 right-0">
                                                    <h2>{{$module->name}} - {{$module->reference}}</h2>
                                                    <div>
                                                        {!! html_entity_decode($module->program) !!}
                                                    </div>

                                                    <span class="closeModal cursor-pointer font-bold">Fermer</span>
                                                </div>
                                            </span>

                                            <span class="deleteModule text-xl ml-2">X</span>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>

                <div class="w-1/2 pl-3 relative ">
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

                                    <div class="moduleInfo shadow-md bg-slate-50 px-2 py-1 w-[calc(25vw-0.75rem)] absolute top-0 left-3 translate-x-[100%]">
                                        <h2>{{$module->name}} - {{$module->reference}}</h2>
                                        <div>
                                            {!! html_entity_decode($module->program) !!}
                                        </div>

                                        <span class="closeModal cursor-pointer font-bold">Fermer</span>
                                    </div>
                                </span>
                                <span class="addModule text-4xl cursor-pointer border rounded-full p-1 w-8 h-8 flex justify-center items-center" data-name="{{$module -> name}}" data-id="{{$module -> id}}" data-hours="{{$module->durationHours}}" data-days="{{$module->durationDays}}" data-program="{{$module->program}}" data-ref="{{$module->reference}}">+</span>
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 w-full">
            <label for="description">Description</label>
            <input class="w-full" type="text" id="description" name="description" value="{{$formation -> description}}">
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="duration_hours">Durée (heure)</label>
            <input id="resultDurationHours" type="hidden" value="{{$formation -> duration_hours}}" name="duration_hours">
            <div class="w-full" type="number" id="duration_hours">
                {{$formation -> duration_hours}}
            </div>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">Durée (jour)</label>
            <input id="resultDurationDays"  type="hidden" value="{{$formation -> duration_days}}" name="duration_days">
            <div class="w-full" type="number" id="duration_days">
                {{$formation -> duration_days}}
            </div>
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-8 rounded-full">
            Modifier
        </button>
    </form>
    
</x-app-layout>
@endauth  
@endif