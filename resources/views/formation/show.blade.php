<x-app-layout>

    <div class="w-5/6 m-auto">
        <h1 class="text-3xl text-center">
            {{$formation -> name}}
        </h1>

        <div>
            <div class="mt-3">
                <h2 class="text-xl text-neutral-600">Programme de la formation : </h2>
                {{$formation -> trainingprogram}}
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
        </div>
        <form action="{{route('formation.destroy', $formation -> id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-slate-50 py-2 px-4 rounded-full" type="submit">Supprimer</button>
        </form>
    </div>
    
</x-app-layout>