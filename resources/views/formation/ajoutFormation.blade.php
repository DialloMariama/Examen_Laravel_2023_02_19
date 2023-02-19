@extends('layout.app')
    @section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="container">
    <div class="card col-md-6 offset-3">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
     <form action="/storess" class="align-middle" method="post">

        @csrf
            <div class="card-header  bg-warning text-dark">
               <h1 class="text-center">AJOUTER FORMATION</h1> 
            </div>
            <div class="card-body">
                <label for="">Nom Formation</label>
                <input name="nomForma" type="text" class="form-control col-md-8">
                <label for="">Durée</label>
                <input name="duree" type="text" class="form-control col-md-8"></input>
                <label for="">Déscription</label>
                <input name="description" type="textarea" class="form-control col-md-8">
                <label for="" >Statut Formation</label>
                <select id="" name="isStarted" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    <option value="Oui">En Cours</option>
                    <option value="Non">En Attente</option>
                </select>
                <label for="">Date de Début</label>
                <input type="date" name="dateDebut" id="" class="form-control">Referentiel<br>
                <select id="" name="referentiel" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    @foreach($referentiel as $referentiel)
                    <option value="{{ $referentiel->id}}"> {{$referentiel->libelleRef}} </option>
                    @endforeach
                </select>

                <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                 <a href="{{ route ('formation.indexFormation') }} " class="btn btn-warning mt-3 offset-4" >Afficher</a>
            </div>

        </form>

    </div>
</div>
@endsection