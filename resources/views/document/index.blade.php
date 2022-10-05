<x-app-layout>


    @foreach ($documents as $document)
    <span>{{$document -> id}}</span>
    @endforeach
</x-app-layout>