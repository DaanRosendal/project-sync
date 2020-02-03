@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-4">
                <a class="btn btn-primary btn-lg" href="{{ route('admin.projecten.create') }}" role="button">Project Aanmaken</a>
            </div>
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Projecten</div>
                    <div class="card-body">
                        <div class="table-responsive-xl">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Aangemaakt</th>
                                        <th scope="col">Aangepast</th>
                                        <th scope="col" style="width: 16%">Acties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projecten as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->naam }}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->created_at)->format('j-n-Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->updated_at)->format('j-n-Y')}}</td>
                                            <td>
                                                <a href="{{ route('admin.projecten.edit', $project) }}"><i class="far fa-edit fa-lg"></i></a>
                                                <a href="{{ route('admin.projecten.delete', $project) }}"
                                                   onclick="return confirm('Weet je zeker dat je dit project wilt verwijderen? Je kunt dit niet ongedaan maken.')">
                                                    <i class="far fa-trash-alt fa-lg ml-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

