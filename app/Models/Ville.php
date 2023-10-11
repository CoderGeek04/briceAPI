<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public function magasins()
    {
        return $this->hasMany(Magasin::class);
    }
}
