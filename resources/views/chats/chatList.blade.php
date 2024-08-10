<x-app-layout>
    @foreach ($chatLists as $chatList)
        <a href="/chat/{{ $chatList->followed->id }}">{{ $chatList->followee_id}}とチャットする</a>
    @endforeach
</x-app-layout>