@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Tutti i giochi
    <span>
        <a href="" class="btn btn-primary">Generi</a>
        <a href="" class="btn btn-primary">Piattaforme</a>
        <a href="{{ route('games.create') }}" class="btn btn-success">Nuovo gioco</a>
    </span>
</h1>

<div class="row row-cols-1 row-cols-xl-2 g-5 mb-5">
    @foreach ($games as $game)
    <div class="col">
        <x-card_index>
            {{-- se passo direttamente il game dà errore, senza il componente invece funziona --}}
            <x-slot:id>{{ $game->id }}</x-slot:id>
            <x-slot:title>{{ $game->title }}</x-slot:title>
            <x-slot:developer>{{ $game->developer}}</x-slot:developer>
            <x-slot:publisher>{{ $game->publisher }}</x-slot:publisher>
            <x-slot:genre>{{ $game->genre->name }}</x-slot:genre>
            <x-slot:release_date>{{ $game->release_date }}</x-slot:release_date>
            <x-slot:price>{{ $game->price }}</x-slot:price>
            <x-slot:rating>{{ $game->rating }}</x-slot:rating>
            <x-slot:reviews>{{ $game->reviews }}</x-slot:reviews>
            {{-- <x-slot:description>{{ $game->description }}</x-slot:description> --}}
        </x-card_index>
    </div>
    @endforeach
</div>

@endsection