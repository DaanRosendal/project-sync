@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errors->first('foreignKeyConstraintViolation'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Je hebt deze kosten al eerder gedeclareerd!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Declaratie indienen</div>

                    <div class="card-body">
                        <form method="POST" action="/declareren" onsubmit="return checkBedrag()">
                            @csrf

                            <div class="form-group row">
                                <label for="project" class="col-md-4 col-form-label text-md-right">Project</label>

                                <div class="col-md-6">
                                    <select id="project" type="text" class="form-control @error('project_id') is-invalid @enderror" name="project_id" required>
                                        <option value="">Selecteer</option>
                                        @foreach ($projecten as $project)
                                            @if (old('project_id') == $project->id)
                                                <option value="{{ $project->id }}" selected>{{ $project->naam }}</option>
                                            @else
                                                <option value="{{ $project->id }}">{{ $project->naam }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('project_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kostenomschrijving" class="col-md-4 col-form-label text-md-right">Kostenomschrijving</label>

                                <div class="col-md-6">
                                    <select id="kostenomschrijving" type="text" class="form-control @error('kosten_id') is-invalid @enderror"
                                            name="kosten_id" required onchange="veranderOmschrijving()">
                                        <option value="">Selecteer</option>
                                        @foreach ($kostenomschrijvingen as $kostenomschrijving)
                                            @if (old('kosten_id') == $kostenomschrijving->id)
                                                <option value="{{ $kostenomschrijving->id }}" selected>{{ $kostenomschrijving->omschrijving }}</option>
                                            @else
                                                <option value="{{ $kostenomschrijving->id }}">{{ $kostenomschrijving->omschrijving }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('kostenomschrijving')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bedrag" id="bedragLabel" id="bedragLabel" class="col-md-4 col-form-label text-md-right">Bedrag (€)</label>

                                <div class="col-md-6" id="">
                                    <input type="text" id="bedrag" name="bedrag" class="form-control @error('bedrag') is-invalid @enderror" value="{{ old('bedrag') }}" required>
                                    @error('bedrag')
                                    <span>
                                        <p class="text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Indienen
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function veranderOmschrijving() {
            var e = document.getElementById("kostenomschrijving");
            var omschrijving = e.options[e.selectedIndex].text;

            if (omschrijving == "Reiskosten - Eigen Auto"){
                document.getElementById('bedragLabel').innerHTML = "Afstand (km)"
            } else {
                document.getElementById('bedragLabel').innerHTML = "Bedrag (€)"
            }
        }

        function checkBedrag()  {
            var e = document.getElementById("kostenomschrijving");
            var omschrijving = e.options[e.selectedIndex].value;
            var afstand = document.getElementById('bedrag').value;

            // Reiskosten - Eigen Auto
            if (omschrijving == 101 && afstand < 10){
                alert ("Reizen onder de 10 kilometer mag je niet declareren");
                return false;
            } else if (omschrijving == 101 && afstand > 100){
                alert ("Reizen boven de 100 kilometer mag je niet declareren. Hiervoor heb je speciale toestemming nodig.");
                return false;
            }

            var bedrag = document.getElementById('bedrag').value;

            // Boeken
            if (omschrijving == 102 && bedrag > 100) {
                alert("Boeken worden t/m 100 euro vergoed");
                return false;
            }

            // Laptop
            if (omschrijving == 201 && bedrag > 1000) {
                alert("Laptops worden t/m 1000 euro vergoed");
                return false;
            }

            return true;
        }
    </script>

@endsection
