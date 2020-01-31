@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">Welkom!</h1>
                    <p class="lead">Project-Sync is een Webapplicatie voor SoftROC, een ICT-consultancy-bedrijf, voor
                        het online en mobiel invoeren van de projectkosten van alle consultants die bij
                        verschillende klanten projecten uitvoeren.</p>
                    <hr class="my-4">
                    <p>Gelieve deze applicatie alleen te gebruiken als u een consultant van SoftROC bent.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Inloggen</a>
                        <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Registreren</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
