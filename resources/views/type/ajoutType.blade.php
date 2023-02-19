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
        <form action="/storeType" class="align-middle" method="post">

        @csrf
            <div class="card-header  bg-warning text-dark">
               <h1 class="text-center">Ajouter un Type</h1> 
            </div>
            <div class="card-body">
                <label for="">Libellé</label>
                <input name="libelleType" type="text" class="form-control col-md-8">
                <button class="btn btn-primary mt-3 offset-2">Enregistrer</button>
                <a href="{{ route ('type.indexType') }} " class="btn btn-warning mt-3 offset-4" >Afficher</a>
            </div>
        </div>

        </form>

    </div>
</div>
@endsection