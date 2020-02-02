@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @error('consultantHeeftGeenDeclaraties')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror

                <div class="card">
                    <div class="card-header">Rapporten inzien</div>
                    <div class="card-body">
                        <form method="POST" action="/rapporten">
                            @csrf

                            <div class="form-group row">
                                <label for="consultant_id" class="col-md-4 col-form-label text-md-right">Consultant</label>

                                <div class="col-md-6">
                                    <select id="consultant_id" type="text" class="form-control @error('consultant_id') is-invalid @enderror" name="consultant_id" required>
                                        <option value="">Selecteer</option>
                                        @foreach ($consultants as $consultant)
                                            @if (isset($geselecteerdeConsultant) && $geselecteerdeConsultant->id == $consultant->id)
                                                <option value="{{ $consultant->id }}" selected>{{ $consultant->name }}</option>
                                            @else
                                                <option value="{{ $consultant->id }}">{{ $consultant->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('consultant_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Bekijk Rapport
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($geselecteerdeConsultant))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 pt-4">
                    <div class="card">
                        <div class="card-header">Kosten van consultant <strong>{{$geselecteerdeConsultant->name}}</strong> per project</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Projectnaam</th>
                                        <th scope="col">Kostencode</th>
                                        <th scope="col">Omschrijving</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Bedrag</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
@endsection
