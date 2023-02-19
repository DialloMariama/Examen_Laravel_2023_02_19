
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
                        @foreach ($formations_par_referentiel as $referentiel)
                            <h5>Le nombre de formations pour le referentiel {{$referentiel->libelleRef}} est de {{$referentiel->formations_count}} </h5><br>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection