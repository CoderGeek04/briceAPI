<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;
    protected $fillable = ['ville_id', 'nom', 'heure_ouverture', 'heure_fermeture'];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
