@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project aanpassen</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/projecten/{{$project->id}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="naam" id="naamLabel" id="naamLabel" class="col-md-4 col-form-label text-md-right">Projectnaam</label>

                                <div class="col-md-6" id="">
                                    <input type="text" id="naam" name="naam" class="form-control @error('naam') is-invalid @enderror" value="{{$project->naam}}" required>
                                    @error('naam')
                                    <span>
                                        <p class="text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Aanpassen
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


