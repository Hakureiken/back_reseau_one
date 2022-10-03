<x-app-layout>
    @if (Auth::user() -> name === 'Kévin Gasté' || (Auth::user() -> role > 30 && Auth::user() -> role < 40) || Auth::user() -> role > 90)
    <h1 class="text-3xl text-center my-4">Page demande d'édition du module {{$module -> name}}</h1>
    <form action="{{route('module.update', $module -> id)}}" method="post" class="flex flex-wrap justify-evenly align-center w-1/2 m-auto">
        @csrf
        @method('PATCH')

        <div class="mt-2 w-1/2 pr-3">
            <label for="name">Nom du module</label>
            <input class="w-full" type="text" id="name" name="name" value="{{$module ->name}}">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="reference">reference</label>
            <input class="w-full" type="text" id="reference" name="reference" value="{{$module ->reference}}">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName">

        <input type="hidden" id="assignedUserId" name="assignedUserId">

        <div class="mt-2 w-full">
            <label for="program">Programme</label>
            <x-trix-field id="program" name="program" value="{!! html_entity_decode($module -> program) !!}" />
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="description">description</label>
            <input class="w-full" type="text" id="description" name="description" value="{{$module ->description}}">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="domain">Domaine</label>
            <select class="w-full" name="domain" id="domain">
                <option value="informatique" {{$module->domain == 'informatique' ? 'selected' : ''}}>Informatique</option>
                <option value="droit" {{$module->domain == 'droit' ? 'selected' : ''}}>Droit</option>
                <option value="rh" {{$module->domain == 'rh' ? 'selected' : ''}}>RH</option>
            </select>
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="duration_hours">duration_hours</label>
            <input class="w-full" type="number" id="duration_ours" name="durationHours" value="{{$module ->durationHours}}">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">duration_days</label>
            <input class="w-full" type="number" id="duration_days" name="durationDays" value="{{$module ->durationDays}}">
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-8 rounded-full">
            Modifier
        </button>
    </form>
    @endif
</x-app-layout>
