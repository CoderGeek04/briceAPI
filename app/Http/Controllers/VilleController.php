<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Ville;
use App\Model\Trajet;

class VilleController extends Controller
{


    public function addVille(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $ville = \App\Models\Ville::create([
            'nom' => $request->input('nom'),
        ]);

        return response()->json(['message' => 'Ville ajoutée avec succès'], 201);
    }

}
