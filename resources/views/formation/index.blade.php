<x-app-layout>
    @visitor
        <h1 class="text-center text-5xl my-10">Les formations à venir</h1>
        <div class="flex flex-wrap justify-evenly">
            @foreach ($formations as $formation)
            @if (Auth::user() -> role > 90 ?: $formation -> is_submitted)
                {{-- {{var_dump($formation)}} --}}
            
                <div class="mx-2 w-96 mb-8 border-solid border-2 border-neutral-600">
                    <div class="h-24">
                        {{-- ajouter la source via les infos dans $formation --}}
                        <img class="h-full object-cover w-full" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg" alt="tree">
                    </div>
                    <div class="p-3">
                        <h2 class="text-center">{{$formation -> name}}</h2>
                        <p class="my-2 line-clamp-3">{{$formation -> description}}</p>
                        <div class="flex justify-around">
                            <div class="py-2 px-4 rounded-full border-solid border border-neutral-600 ">{{$formation -> duration_hours}} heures</div>
                            <div class="py-2 px-4 rounded-full border-solid border border-neutral-600 ">{{$formation -> duration_days}} jours</div>
                        </div>
                    </div>
                    @auth 
                    {{-- {{var_dump($name)}} --}}
                    <div class="flex justify-around mb-2">
                    @if ($formation -> assignedUserName === Auth::user() -> name || (Auth::user() -> role) > 90)
                    
                        <a class="bg-purple-600 text-white py-2 px-4 rounded-full" href="{{route('formation.show',$formation -> laraRef)}}">Voir plus</a>
                    @endif
                        @admin
                        <form action="{{route('formation.destroy', $formation -> id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white py-2 px-4 rounded-full">Supprimer</button>
                        </form>
                        @endadmin
                    </div>
                    @endauth
                </div>
            @endif
            @endforeach
        </div>
    @endvisitor 
</x-app-layout>