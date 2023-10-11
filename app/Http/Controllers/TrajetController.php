<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ville;
use App\Model\Trajet;


class TrajetController extends Controller
{
    //

    public function generateTrajets()
    {
        $villes = \App\Models\Ville::all();
    
        foreach ($villes as $villeDepart) {
            foreach ($villes as $villeArrivee) {
                if ($villeDepart->id !== $villeArrivee->id) {
                    // Vérifiez si un trajet avec les mêmes villes de départ et d'arrivée existe
                    $existingTrajet = \App\Models\Trajet::where('ville_depart', $villeDepart->id)
                        ->where('ville_arrivee', $villeArrivee->id)
                        ->first();
    
                    if (!$existingTrajet) {
                        \App\Models\Trajet::create([
                            'ville_depart' => $villeDepart->id,
                            'ville_arrivee' => $villeArrivee->id,
                            'date_depart' => '2023-12-31', // Remplacez par votre date de départ
                            'heure_depart' => '08:00', // Remplacez par votre heure de départ
                            'prix_trajet' => 0,
                        ]);
                    }
                }
            }
        }
    
        return response()->json(['message' => 'Trajets générés avec succès'], 201);
    }
    

    public function displayTrajets()
    {
        $trajets = \App\Models\Trajet::all();

        $formattedTrajets = $trajets->map(function ($trajet) {
            $villeDepart = \App\Models\Ville::find($trajet->ville_depart)->nom;
            $villeArrivee = \App\Models\Ville::find($trajet->ville_arrivee)->nom;
            return [
                'id' => $trajet->id,
                'trajet' => $villeDepart . '-' . $villeArrivee,
            ];
        });

        return response()->json(['trajets' => $formattedTrajets]);
    }

}
