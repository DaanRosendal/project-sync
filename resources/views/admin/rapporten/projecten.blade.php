@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @error('projectBevatGeenDeclaraties')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror

            <div class="card">
                <div class="card-header">Rapport 2 - Kosten per project</div>
                <div class="card-body">
                    <form method="POST" action="/admin/rapporten/projecten">
                        @csrf

                        <div class="form-group row">
                            <label for="project_id" class="col-md-4 col-form-label text-md-right">Project</label>

                            <div class="col-md-6">
                                <select id="project_id" type="text" class="form-control @error('project_id') is-invalid @enderror" name="project_id" required>
                                    <option value="">Selecteer</option>
                                    @foreach ($projecten as $project)
                                    @if (isset($geselecteerdeProject) && $geselecteerdeProject->id == $project->id)
                                    <option value="{{ $project->id }}" selected>{{ $project->naam }}</option>
                                    @else
                                    <option value="{{ $project->id }}">{{ $project->naam }}</option>
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

@if(isset($geselecteerdeProject))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
            <div class="card">
                <div class="card-header">Kosten van project <strong>{{$geselecteerdeProject->naam}}</strong></div>
                    <div class="card-body">
                        <div class="table-responsive-xl">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Consultant</th>
                                    <th scope="col">Kostencode</th>
                                    <th scope="col">Omschrijving</th>
                                    <th scope="col">Datum</th>
                                    <th scope="col">Bedrag</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $huidigeConsultant = ""; $totaal = 0; $subtotaal = 0; $aantalConsultants = 0;@endphp
                                @foreach($kosten as $kost)
                                    @php
                                    if($huidigeConsultant == $kost->consultant){
                                        $subtotaal += $kost->bedrag;
                                    } else {
                                        // Laat geen subtotalen zien bij de eerste iteration
                                        if (!$loop->first){
                                            echo "
                                            <tr>
                                                <td colspan='3'></td>
                                                <th>Subtotaal</th>
                                                <th>&euro;" . str_replace('.', ',', $subtotaal) . "</th>
                                            </tr>";
                                        }

                                        $subtotaal = 0;
                                        $subtotaal += $kost->bedrag;
                                        $aantalConsultants++;
                                    }
                                    @endphp

                                    <tr>
                                        @php
                                            if($huidigeConsultant == $kost->consultant){
                                                echo "<td></td>";
                                            } else {
                                                echo "<td>$kost->consultant</td>";
                                            }
                                            $huidigeConsultant = $kost->consultant;
                                        @endphp

                                        <td>{{ $kost->kostencode }}</td>
                                        <td>{{ $kost->omschrijving }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kost->datum)->format('j-n-Y')}}</td>
                                        <td>&euro;{{ str_replace('.', ',', $kost->bedrag) }}</td>
                                    </tr>

                                    @php $totaal += $kost->bedrag; @endphp
                                @endforeach
                                @if($aantalConsultants > 1)
                                    <tr>
                                        <td colspan="3"></td>
                                        <th>Subtotaal</th>
                                        <th>&euro;@php echo str_replace('.', ',', $subtotaal); @endphp</th>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="3"></td>
                                    <th>Totaal</th>
                                    <th>&euro;@php echo str_replace('.', ',', $totaal); @endphp</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
