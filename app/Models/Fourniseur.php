<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourniseur extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prenom",
        "contact",
        "email",
    ];

    public function materiels()
    {
        return $this->hasMany(Materiel::class, 'fourniseur_id', 'id');
    }
}
