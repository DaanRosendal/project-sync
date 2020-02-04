@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Consultant aanpassen</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/consultants/{{$consultant->id}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" id="nameLabel" id="nameLabel" class="col-md-4 col-form-label text-md-right">Naam</label>

                                <div class="col-md-6" id="">
                                    <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{$consultant->name}}" required>
                                    @error('name')
                                    <span>
                                        <p class="text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" id="emailLabel" id="emailLabel" class="col-md-4 col-form-label text-md-right">E-mail</label>

                                <div class="col-md-6" id="">
                                    <input type="email" id="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{$consultant->email}}" required>
                                    @error('email')
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
