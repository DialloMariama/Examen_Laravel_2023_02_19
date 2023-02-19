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
        <form action="/storeReferentiel" class="align-middle" method="post">

        @csrf
            <div class="card-header  bg-warning text-dark">
               <h1 class="text-center">AJOUTER REFERENTIEL</h1> 
            </div>
            <div class="card-body">
                <label for="">Libellé</label>
                <input name="libelleRef" type="text" class="form-control col-md-8">
                <label for="" >Validated</label>
                <select id="" name="validated" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    <option value="Oui">OUI</option>
                    <option value="Non">NON</option>
                </select>
                <label for="">Horaire</label>
                <input name="horaire" type="number" class="form-control col-md-8">
                <label for="">Type</label>
                <select id="" name="type" class="form-control col-md-8">
                    <option value="">Sélectionner</option>
                    @foreach($type as $type)
                    <option value="{{ $type->id}}"> {{$type->libelleType}} </option>
                    @endforeach
                </select>
                <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                <a href="{{ route ('referentiel.indexReferentiel') }} " class="btn btn-warning mt-3 offset-4" >Afficher</a>
            </div>
        </div>

        </form>

    </div>
</div>
@endsection