<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomCandidat",
        "prenomCandidat",
        "email",
        "age",
        "niveauEtude",
        "sexe"];
        public $timestamps = false;

        public function formations(){
            return $this->belongsToMany(Formation::class);
        }
}
