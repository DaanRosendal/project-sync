@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-4">
                <a class="btn btn-primary btn-lg" href="{{ route('admin.kosten.create') }}" role="button">Kost Aanmaken</a>
            </div>
            <div class="col-lg-8 col-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Kosten</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Omschrijving</th>
                                    <th scope="col">Aangemaakt</th>
                                    <th scope="col">Aangepast</th>
                                    <th scope="col" style="width: 10px"><i class="fas fa-edit fa-lg"></i></th>
                                    <th scope="col" style="width: 10px"><i class="fas fa-trash-alt fa-lg"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kosten as $kost)
                                    <tr>
                                        <td>{{ $kost->id }}</td>
                                        <td>{{ $kost->omschrijving }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kost->created_at)->format('j-n-Y')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($kost->updated_at)->format('j-n-Y')}}</td>
                                        <td>
                                            <a href="{{ route('admin.kosten.edit', $kost) }}"><i class="far fa-edit fa-lg"></i></a>

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.kosten.delete', $kost) }}"
                                               onclick="return confirm('Weet je zeker dat je deze kost wilt verwijderen? Je kunt dit niet ongedaan maken.')">
                                                <i class="far fa-trash-alt fa-lg"></i></a>
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
