<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;
    protected $fillable = ['trajet_id', 'nombre_ticket', 'nom', 'prenom', 'paiement', 'prix', 'user_id'];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
