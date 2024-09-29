<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "qte",
        "discription",
        "fourniseur_id",
    ];
    
    public function fourniseurs()
    {
        return $this->belongTo(Fourniseur::class);
    }

    public function bonSorties()
    {
        return $this->belongsToMany(BonSortie::class)->withTimestamps();
    }
}
