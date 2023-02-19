<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomForma",
        "duree",
        "description",
        "isStarted",
        "dateDebut"
        ];
        
        public $timestamps = false;

        public function candidats(){
            return $this->belongsToMany(Candidat::class);
        }
        
        public function referentiel()
    {
        return $this->belongsTo(Referentiel::class);
    }
}
