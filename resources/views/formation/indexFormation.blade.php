@extends('layout.app')
    @section('content')
    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste de Formation</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom Formation</th>
                                        <th>Durée</th>
                                        <th>Déscription</th>
                                        <th>Démarrage</th>
                                        <th>Date de debut</th>
                                        <th>Referentiel</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($formations as $formation)
                                    <tr>
                                        <td>{{ $formation->id}}</td>
                                        <td>{{ $formation->nomForma}}</td>
                                        <td>{{ $formation->duree}}</td>
                                        <td>{{ $formation->description}}</td>
                                        <td>{{ $formation->isStarted}}</td>
                                        <td>{{ $formation->dateDebut}}</td>
                                        <td>{{ $formation->referentiel->libelleRef}}</td>                                                                            
                                        <td>
                                            <!-- <a href="{{ route('formation.show', ['id' =>$formation->id ]) }}" class="btn btn-primary">Details Projet</a> -->
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
