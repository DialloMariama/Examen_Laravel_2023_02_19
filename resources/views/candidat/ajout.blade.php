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
        <form action="/stores" class="align-middle" method="post">
        @csrf
            <div class="card-header  bg-warning text-dark">
               <h1 class="text-center">AJOUT CANDIDAT</h1> 
            </div>
            <div class="card-body">
                <label for="" class="col-md-4 h5 text-left pt-1">Nom</label>
                <input name="nomCandidat" type="text" class="form-control col-md-8">
                <label for="" class="col-md-4 h5 text-left pt-1">Prénom </label>
                <input name="prenomCandidat" type="text" class="form-control col-md-8"></input>
                <label for="" class="col-md-4 h5 text-left pt-1">Email</label>
                <input name="email" type="email" class="form-control col-md-8">
                <label for="" class="col-md-4 h5 text-left pt-1">age</label>
                <input name="age" type="number" class="form-control col-md-8">
                <label for="" class="col-md-4 h5 text-left pt-1"required>Niveau d'étude</label>
                <input name="niveauEtude" type="text" class="form-control col-md-8">
                <label for="" class="col-md-4 h5 text-left pt-1">Sexe</label>
                <select id="" name="sexe" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    <option value="Masculin">Masculin</option>
                    <option value="Feminin">Féminin</option>
                </select>
                <label for="" class="col-md-4 h5 text-left pt-1">Formation</label>
                <select id="" name="formations" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    @foreach($formations as $formation)
                    <option value="{{ $formation->id}}"> {{$formation->nomForma}} </option>
                    @endforeach
                </select>
                <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                 <a href="{{ route ('candidat.index') }}" class="btn btn-warning mt-3 offset-4" >Afficher</a>
            </div>

        </form>

    </div>
</div>
@endsection