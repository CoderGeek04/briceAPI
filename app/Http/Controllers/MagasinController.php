<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ville;
use App\Model\Magasin;

class MagasinController extends Controller
{
    public function listerMagasinsParVille(Request $request)
    {
        /*$request->validate([
            'ville_id' => 'required|exists:villes,id',
        ]);*/

        $ville = \App\Models\Ville::find($request->input('ville_id'));

        if (!$ville) {
            return response()->json(['message' => 'Ville non trouvée'], 404);
        }

        $magasins = \App\Models\Magasin::where('ville_id', $ville->id)->get();

        return response()->json(['magasins' => $magasins]);
    }

}
