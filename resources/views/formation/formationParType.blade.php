
@extends('layout.app')

    @section('content')
<div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h2>Repartition des Formations par Type</h2>
                    </div>
                    <div class="card-body">
                        <br> <br>
                        <div class="table-responsive">
                            <div>
                                <?php foreach ($types as $type) : ?>
                                <?php $nbFormations = 0; ?>
                                <?php foreach ($type->referentiels as $referentiel) : ?>
                                <?php $nbFormations += $referentiel->formations()->count(); ?>
                                <?php endforeach; ?>
                                <h5>Le type <?= $type->libelleType ?> a <?= $nbFormations ?> formations</h5><br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection