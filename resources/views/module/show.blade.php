<x-app-layout>
    @if (Auth::user() -> name === 'Kévin Gasté' || (Auth::user() -> role > 30 && Auth::user() -> role < 40) || Auth::user() -> role > 90)
        
    <h1 class="text-4xl text-center py-4">Liste des modules validés</h1>
    <div class="flex flex-wrap justify-evenly">
        <div class="max-w-[3/5] w-[800px] p-3 m-2 rounded-3 border bg-slate-50">

            <h2 class="py-1 px-3 w-full text-center"><span class="font-semibold"> Nom : </span class="font-semibold">{{$module -> name}} - <span class="font-semibold">Référence : </span> {{$module -> reference}}</h2>
            <div class="line-clamp-3 my-2">
                {!! html_entity_decode($module -> program) !!}
            </div>
            <div>
                <div class="font-semibold">Description : </div>
                {{$module->description}}
            </div>
            <div class="flex justify-around flex-wrap my-4">
                <span class="w-full">Durée : </span>
                <span class="text-center rounded-full py-2 w-24 border">{{$module->durationHours}} heures</span>
                <span class="text-center rounded-full py-2 w-24 border">{{$module->durationDays}} jours</span>
            </div>
            <div class="flex justify-around">
                <a class="bg-purple-600 text-white py-2 px-4 rounded-full" href="{{route('module.edit', $module -> id)}}">Modifier</a>
                @admin
                <form action="{{route('module.destroy', $module->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white py-2 px-4 rounded-full">Supprimer</button>
                </form>
                @endadmin
            </div>
        </div>
    </div>
    @endif
</x-app-layout>