@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-dark rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <img src="{{ Vite::asset('./resources/assets/img/logo/png/logo-no-background.png') }}" class="w-25" alt="fdc-logo ">
        </div>
        <h1 class="display-5 fw-bold my-4">
            Benvenuti nel mio progetto finale di Laravel
        </h1>

        <p class="col-md-8 fs-4">
            In questo sito ci sono una parte backoffice e una frontoffice.
            In quella backoffice è possibile registrarsi e accedere per gestire il profilo stesso, i videogiochi, le piattaforme e i generi,
            e una frontoffice per consultare il sito come ospite.
        </p>
        <a href="https://github.com/deca-francesco" target="_blank" class="btn btn-primary btn-lg" type="button">Il mio
            Github</a>
        <a class="btn btn-primary btn-lg ms-3" href="">Gestisci videogiochi</a>
    </div>
</div>

<div class="content">

</div>
@endsection