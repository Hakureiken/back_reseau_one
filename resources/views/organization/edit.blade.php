<x-app-layout>

    <form action="{{route('organization.update',$organization)}}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="type">
        <button type="submit">Modifier</button>
    </form>
    
</x-app-layout>
