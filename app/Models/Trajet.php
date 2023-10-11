<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    protected $fillable = ['ville_depart', 'ville_arrivee'];

    public function billets()
    {
        return $this->hasMany(Billet::class);
    }

    public function villeDepart()
    {
        return $this->belongsTo(Ville::class, 'ville_depart');
    }

    public function villeArrivee()
    {
        return $this->belongsTo(Ville::class, 'ville_arrivee');
    }
}
