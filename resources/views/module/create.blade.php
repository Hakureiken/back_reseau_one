<x-app-layout>

    @client
    <h1 class="text-3xl text-center my-4">Page demande de creation d'un module</h1>
    <form action="{{route('module.store')}}" method="post" class="flex flex-wrap justify-evenly align-center w-1/2 m-auto">
        @csrf

        <div class="mt-2 w-1/2 pr-3">
            <label for="name">Nom du module</label>
            <input class="w-full" type="text" id="name" name="name">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="reference">reference</label>
            <input class="w-full" type="text" id="reference" name="reference">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName">

        <input type="hidden" id="assignedUserId" name="assignedUserId">

        <div class="mt-2 w-full">
            <label for="program">Programme</label>
            <x-trix-field id="program" name="program" />
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="description">description</label>
            <input class="w-full" type="text" id="description" name="description">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="domain">Domaine</label>
            <select class="w-full" name="domain" id="domain">
                <option value="choisissez votre domaine" selected disabled>Choisissez votre domaine</option>
                <option value="informatique">Informatique</option>
                <option value="droit">Droit</option>
                <option value="rh">RH</option>
            </select>
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="duration_hours">duration_hours</label>
            <input class="w-full" type="number" id="duration_ours" name="durationHours">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">duration_days</label>
            <input class="w-full" type="number" id="duration_days" name="durationDays">
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-8 rounded-full">
            Créer
        </button>
    </form>
    @endclient
</x-app-layout>