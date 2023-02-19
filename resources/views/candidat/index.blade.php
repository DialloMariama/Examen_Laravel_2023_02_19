@extends('layout.app')
    @section('content')
    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Examen (Gestion de Candidature)</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Niveau d'étude</th>
                                        <th>Sexe</th>
                                        <th>Formation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($candidats as $candidat)
                                    <tr>
                                        <td>{{ $candidat->id}}</td>
                                        <td>{{ $candidat->nomCandidat}}</td>
                                        <td>{{ $candidat->prenomCandidat}}</td>
                                        <td>{{ $candidat->email}}</td>
                                        <td>{{ $candidat->age}}</td>
                                        <td>{{ $candidat->niveauEtude}}</td>
                                        <td>{{ $candidat->sexe}}</td>
                                        @foreach($candidat->formations as $f)
                                            <td>{{$f->nomForma}}</td>
                                        @endforeach 
                                        
                                        <td>
                                            <!-- <a href="{{ route('candidat.show', ['id' =>$candidat->id ]) }}" class="btn btn-primary">Details Projet</a> -->
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
