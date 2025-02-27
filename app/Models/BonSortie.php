<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSortie extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "user_id",
        "magasinier"
    ];

    public function materiels()
    {
        return $this->belongsToMany(Materiel::class);
    }
    
}
