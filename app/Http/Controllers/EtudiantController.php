<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    function getAllStudents()
    {
        $etudiants = Etudiant::all();
        $etudiants->makeHidden(['EST_MODERATEUR', 'PASSWORD', 'JETON_VALIDATION']);
        return response()->json($etudiants, 200);
    }

    function storeNewStudent(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $etudiant = Etudiant::create([
            'IDCLASSE' => $request->id_classe,
            'NOM' => $request->nom,
            'PRENOM' => $request->prenom,
            'EMAIL' => $request->email,
            'DATENAISS' => $request->date_naissance,
            'EST_MODERATEUR' => 0,
            'PASSWORD' => Hash::make(Str::password(12, true, true, false, false)),
            'ETAT_COMPTE' => 1
        ]);

        /* Création du nouvel Etudiant */
        return response()->json($etudiant, 200);
    }

    function updateStudent(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $etudiant = Etudiant::find($request->id_etudiant);

        if ($request->id_classe != null) {
            $etudiant->IDCLASSE = $request->id_classe;
        }
        if ($request->nom != null) {
            $etudiant->NOM = $request->nom;
        }
        if ($request->prenom != null) {
            $etudiant->PRENOM = $request->prenom;
        }
        if ($request->email != null) {
            $etudiant->EMAIL = $request->email;
        }
        if ($request->date_naissance != null) {
            $etudiant->DATENAISS = $request->date_naissance;
        }
        if ($request->est_moderateur != null) {
            $etudiant->EST_MODERATEUR = $request->est_moderateur;
        }

        $etudiant->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }

    function deleteStudent(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $etudiant = Etudiant::find($request->id_etudiant);

        $etudiant->ETAT_COMPTE = 4;

        $etudiant->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }
}
