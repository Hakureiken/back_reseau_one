<x-app-layout>

    <div id="showFormation" class="w-5/6 m-auto">
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
        <div class="flex my-3">
            <a class="bg-purple-600 text-white py-2 px-4 rounded-full mr-2" href="{{route('formation.edit', $formation -> laraRef )}}">Modifier</a>
            <form action="{{route('formation.destroy', $formation -> id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-slate-50 py-2 px-4 rounded-full" type="submit">Supprimer</button>
            </form>
        </div>
    </div>
    
</x-app-layout>