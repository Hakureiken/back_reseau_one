<x-app-layout>


    <h1 class="text-3xl text-center my-4">Page demande de creation d'une formation</h1>
    <form id="createFormation" action="{{route('formation.store')}}" method="post" class="flex flex-wrap justify-evenly align-center w-1/2 m-auto">
        @csrf
        <div class="mt-2 w-1/2 pr-3">
            <label for="name">Nom de la formation</label>
            <input class="w-full" type="text" id="name" name="name">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="reference">Reference</label>
            <input class="w-full" type="text" id="reference" name="reference">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName">

        <input type="hidden" id="assignedUserId" name="assignedUserId">

        <div class="mt-2 w-1/2 pr-3">
            <label for="concernedPublic">Publique concerné</label>
            <textarea class="w-full" id="concernedPublic" name="concernedPublic"></textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="dateAndLocation">Dates et lieux</label>
            <textarea class="w-full" id="dateAndLocation" name="dateAndLocation"></textarea>
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="prerequisite">Pré-requis</label>
            <textarea class="w-full" id="prerequisite" name="prerequisite"></textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="objective">Les objectifs de la formation</label>
            <textarea class="w-full" id="objective" name="objective"></textarea>
        </div>

        <div class="mt-2 w-full">
            <label for="trainingprogram">Programme de la formation</label>
            {{-- contenu dynamique des modules ajoutés --}}
            <div class="flex justify-between">
                <div class="w-1/2">
                    <ul class="list-disc px-5 flex flex-wrap" id="affectedModules">

                    </ul>
                </div>

                <div class="w-1/2">
                    <div id="activeModule" class="bg-lime-500 text-slate-50 text-center mb-2 py-2 px-8 rounded-full cursor-pointer w-full">
                        Ajouter
                    </div>
                    <div id="modules" class="hidden h-64 p-2 border bg-slate-50 overflow-y-scroll">
                        <input id="searchModule" class="w-full" type="text" placeholder="Rechercher">
                        @foreach ($modules as $module)
                        <div class="flex items-center justify-between my-1">
                            <span>{{$module -> id}} - {{$module -> name}}</span>
                            <span class="addModule text-4xl cursor-pointer border rounded-full p-1 w-8 h-8 flex justify-center items-center" data-name="{{$module -> name}}" data-id="{{$module -> id}}" data-days="{{$module->durationDays}}" data-hours="{{$module->durationHours}}">+</span>
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
            <label for="duration_hours">Durée (heure)</label>
            <input id="resultDurationHours" type="hidden" value="" name="duration_hours">
            <div class="w-full" type="number" id="duration_hours">
            </div>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">Durée (jour)</label>
            <input id="resultDurationDays"  type="hidden" value="" name="duration_days">
            <div class="w-full" type="number" id="duration_days">
            </div>
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-8 rounded-full">
            Créer
        </button>
    </form>
    
</x-app-layout>