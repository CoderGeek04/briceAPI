<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = ['billet_id', 'date_paiement', 'heure_paiement', 'numero_paiement', 'montant_paiement', 'mode_paiement'];

    public function billet()
    {
        return $this->belongsTo(Billet::class);
    }
}
