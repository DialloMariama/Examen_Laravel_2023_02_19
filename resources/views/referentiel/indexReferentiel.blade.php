@extends('layout.app')
    @section('content')
    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste de Referentiel</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libellé</th>
                                        <th>Validated</th>
                                        <th>Horaire</th>
                                        <th>Type</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($referentiels as $referentiel)
                                    <tr>
                                        <td>{{ $referentiel->id}}</td>
                                        <td>{{ $referentiel->libelleRef}}</td>
                                        <td>{{ $referentiel->validated}}</td>
                                        <td>{{ $referentiel->horaire}}</td>
                                        <td>{{ $referentiel->type->libelleType}}</td>                                                                            
                                         
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
