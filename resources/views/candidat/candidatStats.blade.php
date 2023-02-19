@extends('layout.app')

    @section('content')
<div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h2>Repartition des Candidats par Sexe</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                        <div>
                            <h4>Nombre total de candidats : {{ $totalCandidats }}</h4><br>
                            <h5>Nombre de candidats masculins : {{ $maleCandidats }}</h5><br>
                            <h5>Nombre de candidats féminins : {{ $femaleCandidats }}</h5><br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection