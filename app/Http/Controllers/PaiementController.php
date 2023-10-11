<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Billet;
use App\Model\Paiement;

class PaiementController extends Controller
{

    public function payerBillet(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'billet_id' => 'required|exists:billets,id',
            'mode_paiement' => 'required|string|max:255',
            'numero_paiement' => 'required|integer',
            'montant_paiement' => 'required|numeric|min:0',
        ]);

        $billet = \App\Models\Billet::find($request->input('billet_id'));

        if (!$billet || $billet->paiement) {
            return response()->json(['message' => 'Le billet est introuvable ou déjà payé'], 400);
        }


        

        // Enregistrez les informations de paiement dans la table "paiements"
        \App\Models\Paiement::create([
            'date_paiement' => now(),
            'heure_paiement' => now()->format('H:i:s'),
            'mode_paiement' => $request->input('mode_paiement'),
            'numero_paiement' => $request->input('numero_paiement'),
            'montant_paiement' => $request->input('montant_paiement'),
            'billet_id' => $billet->id,
        ]);

        $billet->update(['paiement' => true]);

        return response()->json(['message' => 'Paiement réussi'], 200);
    }

}
