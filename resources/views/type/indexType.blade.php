@extends('layout.app')
    @section('content')
    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Liste Type</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libellé</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->id}}</td>
                                        <td>{{ $type->libelleType}}</td>
                                        
                                        <td>
                                            <!-- <a href="{{ route('type.show', ['id' =>$type->id ]) }}" class="btn btn-primary">Details Projet</a> -->
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
