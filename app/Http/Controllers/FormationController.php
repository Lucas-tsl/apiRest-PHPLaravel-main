<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    function getAllFormations(){
        return response()->json(Formation::all(), 200);
    }

    function storeNewFormation(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $formation = Formation::create([
            'LIBELLE' => $request->libelle
        ]);

        /* Création du nouvel Etudiant */
        return response()->json($formation, 200);
    }

    function updateFormation(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $formation = Formation::find($request->id_formation);

        if ($request->libelle != null) {
            $formation->LIBELLE = $request->libelle;
        }

        $formation->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }

    function deleteFormation(Request $request)
    {
        /* Création du Nouvel Etudiant */
        Formation::where('IDFORMATION', $request->id_formation)->delete();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }
}
