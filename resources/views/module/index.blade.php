<x-app-layout>

    @client
    @auth
        
        <h1 class="text-4xl text-center pb-4 pt-20 lg:py-4 relative">Liste des modules validés <a class="absolute top-10 right-[20%] lg:top-1/2 lg:right-14 -translate-y-1/2 text-xl hover:underline border rounded-full py-2 px-4 bg-lime-500 text-slate-50" href="{{route('module.create')}}">Créer un module</a></h1>
        <div class="flex flex-wrap justify-evenly">
            @foreach ($modules as $module)
            {{-- remplacer 'Kévin Gasté' par $module -> assignedUserName --}}
            @if (Auth::user() -> name === 'Kévin Gasté' || (Auth::user() -> role > 30 && Auth::user() -> role < 40) || Auth::user() -> role > 90)
                
           
            <div class="w-[400px] p-3 m-2 rounded-3 border bg-slate-50">

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
                    <a class="text-center bg-purple-600 text-white py-2 w-24 rounded-full" href="{{route('module.show', $module -> id)}}">Voir plus</a>
                    @admin
                    <form action="{{route('module.destroy', $module->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white text-center w-24 py-2 rounded-full">Supprimer</button>
                    </form>
                    @endadmin
                </div>
            </div>
            @endif
            @endforeach
        </div>
    @endauth
    @endclient

</x-app-layout>