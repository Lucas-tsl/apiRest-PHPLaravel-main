<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClasseController extends Controller
{
    function getAllClasses(){
        return response()->json(Classe::all(), 200);
    }

    function storeNewClasse(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $classe = Classe::create([
            'IDFORMATION' => $request->id_formation,
            'LIBELLE' => $request->libelle,
            'NIVEAU' => $request->niveau
        ]);

        /* Création du nouvel Etudiant */
        return response()->json($classe, 200);
    }

    function updateClasse(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $classe = Classe::find($request->id_classe);

        if ($request->id_formation != null) {
            $classe->IDFORMATION = $request->id_formation;
        }
        if ($request->libelle != null) {
            $classe->LIBELLE = $request->libelle;
        }
        if ($request->niveau != null) {
            $classe->NIVEAU = $request->niveau;
        }

        $classe->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }

    function deleteClasse(Request $request)
    {
        /* Création du Nouvel Etudiant */
        Classe::where('IDCLASSE', $request->id_classe)->delete();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }
}
