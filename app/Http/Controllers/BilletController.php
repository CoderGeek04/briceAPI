<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Billet;

class BilletController extends Controller
{
    //
    public function reserveBillet(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'trajet_id' => 'required|exists:trajets,id',
            'nombre_ticket' => 'required|integer|min:1',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
        ]);

        $billet = \App\Models\Billet::create([
            'trajet_id' => $request->input('trajet_id'),
            'nombre_ticket' => $request->input('nombre_ticket'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'prix' => $request->input('prix'),
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Billet réservé avec succès'], 201);
    }

    public function billetsPayes()
    {
        $billets = \App\Models\Billet::where('paiement', true)->get();

        return response()->json(['billets' => $billets]);
    }

}
