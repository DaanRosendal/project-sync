@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="">Welkom, <strong>{{ auth()->user()->name }}</strong> -
                        @if(auth()->user()->is_admin) Administrator
                        @elseif(! auth()->user()->is_admin) Consultant
                        @endif
                    </h3>
                    <hr />
                    <p class="lead">
                        @if(Auth::user()->is_admin == false)
                            <a href="{{ route('declareren') }}">Declareren</a> |
                            <a href="{{ route('rapporten') }}">Rapporten</a>
                        @elseif(Auth::user()->is_admin == true)
                            <a href="{{ route('admin.projecten.index') }}">Projecten</a> |
                            <a href="{{ route('admin.kosten.index') }}" role="button">Kosten</a> |
                            <a href="{{ route('admin.consultants.index') }}" role="button">Consultants</a> |

                            <a href="{{ route('admin.rapporten.consultants') }}" role="button">Rapport 1</a> |
                            <a href="{{ route('admin.rapporten.projecten') }}" role="button">Rapport 2</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
