@auth
@if (Auth::user()-> role < 90 || Auth::user() -> name == $formation -> assignedUserName)

<x-app-layout>
    <h1 class="text-3xl text-center my-4">Modification de la formation "{{$formation -> name}}"</h1>
    <form action="{{route('formation.update',$formation)}}" method="post" class="flex flex-wrap justify-evenly align-center w-1/2 m-auto">
        @csrf
        @method('PATCH')
        <div class="mt-2 w-1/2 pr-3">
            <label for="name">Nom de la formation</label>
            <input class="w-full" type="text" id="name" name="name" value={{$formation -> name}}>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="reference">reference</label>
            <input class="w-full" type="text" id="reference" name="reference" value="{{$formation -> reference}}">
        </div>

        <input type="hidden" id="assignedUserName" name="assignedUserName">

        <input type="hidden" id="assignedUserId" name="assignedUserId">

        <div class="mt-2 w-1/2 pr-3">
            <label for="concernedPublic">concernedPublic</label>
            <textarea class="w-full" id="concernedPublic" name="concernedPublic"> {{$formation -> concernedPublic}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="dateAndLocation">dateAndLocation</label>
            <textarea class="w-full" id="dateAndLocation" name="dateAndLocation"> {{$formation -> dateAndLocation}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="prerequisite">prerequisite</label>
            <textarea class="w-full" id="prerequisite" name="prerequisite" >{{$formation -> prerequisite}}</textarea>
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="objective">objective</label>
            <textarea class="w-full" id="objective" name="objective" >{{$formation -> objective}}</textarea>
        </div>

        <div class="mt-2 w-full">
            <label for="trainingprogram">trainingprogram</label>
            <textarea class="w-full" id="trainingprogram" name="trainingprogram"> {{$formation -> trainingprogram}}</textarea>
        </div>

        <div class="mt-2 w-full">
            <label for="description">description</label>
            <input class="w-full" type="text" id="description" name="description" value="{{$formation -> description}}">
        </div>

        <div class="mt-2 w-1/2 pr-3">
            <label for="duration_hours">duration_hours</label>
            <input class="w-full" type="number" id="duration_hours" name="duration_hours" value="{{$formation -> duration_hours}}">
        </div>

        <div class="mt-2 w-1/2 pl-3">
            <label for="duration_days">duration_days</label>
            <input class="w-full" type="number" id="duration_days" name="duration_days" value="{{$formation -> duration_days}}">
        </div>

        <button class="mt-4 bg-lime-500	text-slate-50 py-2 px-4 rounded-full">
            Modifier
        </button>
    </form>

</x-app-layout>
@endauth  
@endif