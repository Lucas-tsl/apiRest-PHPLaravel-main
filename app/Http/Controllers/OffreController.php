<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Service;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    function getAllOffersforOneService(Request $request)
    {
        $offres = Offre::where('IDSERVICE', $request->id_service)->get();
        return response()->json($offres, 200);
    }

    function storeNewOffer(Request $request)
    {
        /* Création de la Nouvelle Offre */
        $offre = new Offre();
        $offre->IDUTILISATEUR = $request->id_utilisateur;
        $offre->IDUTILISATEUR_1 = Service::where('IDSERVICE', $request->id_service)->first()->IDUTILISATEUR;
        $offre->IDSERVICE = $request->id_service;
        $offre->PRIX = $request->prix;
        $offre->save();

        return response()->json($offre, 200);
    }
}
