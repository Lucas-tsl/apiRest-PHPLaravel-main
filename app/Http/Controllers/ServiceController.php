<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Loisir;
use App\Models\Lecture;
use App\Models\Service;
use App\Models\Covoiturage;
use Illuminate\Http\Request;
use App\Models\EvenementSportif;
use App\Models\EchangeCompetence;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /* Requête GET */
    function getAllServices()
    {
        return response()->json(Service::all());
    }
    function getAllActiveServices()
    {
        return response()->json(Service::all()->where('ETAT', 1));
    }
    function getAllCarpools()
    {
        $allCarpools = DB::table('service')
            ->join('covoiturage', 'service.IDSERVICE', '=', 'covoiturage.IDSERVICE')
            ->where('service.TYPE', 'covoiturage')
            ->where('service.ETAT', 1)
            ->select('service.*', 'covoiturage.*')
            ->get();

        return response()->json($allCarpools);
    }
    function getAllExchangeOfSkills()
    {
        $allExchangeOfSkills = DB::table('service')
            ->join('echange_competences', 'service.IDSERVICE', '=', 'echange_competences.IDSERVICE')
            ->where('service.TYPE', 'echange_competences')
            ->where('service.ETAT', 1)
            ->select('service.*', 'echange_competences.*')
            ->get();

        return response()->json($allExchangeOfSkills);
    }
    function getAllAthleticEvents()
    {
        $allAthleticEvents = DB::table('service')
            ->join('evenement_sportif', 'service.IDSERVICE', '=', 'evenement_sportif.IDSERVICE')
            ->where('service.TYPE', 'evenement_sportif')
            ->where('service.ETAT', 1)
            ->select('service.*', 'evenement_sportif.*')
            ->get();

        return response()->json($allAthleticEvents);
    }
    function getAllBookClubs()
    {
        $allAthleticEvents = DB::table('service')
            ->join('lecture', 'service.IDSERVICE', '=', 'lecture.IDSERVICE')
            ->where('service.TYPE', 'lecture')
            ->where('service.ETAT', 1)
            ->select('service.*', 'lecture.*')
            ->get();

        return response()->json($allAthleticEvents);
    }
    function getAllSpareTimes()
    {
        $allAthleticEvents = DB::table('service')
            ->join('loisirs', 'service.IDSERVICE', '=', 'loisirs.IDSERVICE')
            ->where('service.TYPE', 'loisirs')
            ->where('service.ETAT', 1)
            ->select('service.*', 'loisirs.*')
            ->get();

        return response()->json($allAthleticEvents);
    }
    function getAllCinemas()
    {
        $allAthleticEvents = DB::table('service')
            ->join('cinema', 'service.IDSERVICE', '=', 'cinema.IDSERVICE')
            ->where('service.TYPE', 'cinema')
            ->where('service.ETAT', 1)
            ->select('service.*', 'cinema.*')
            ->get();

        return response()->json($allAthleticEvents);
    }

    /* Requête POST */
    function storeNewCarpool(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'Covoiturage';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création du Nouveau Covoiturage */
        $covoiturage = new Covoiturage();
        $covoiturage->IDSERVICE = $lastInsertedID + 1;
        $covoiturage->IDUTILISATEUR = $request->id_utilisateur;
        $covoiturage->NUMEROARRIVEE = $request->numero_arrivee;
        $covoiturage->RUEARRIVEE = $request->rue_arrivee;
        $covoiturage->CODEPOSTALARRIVEE = $request->code_postal_arrivee;
        $covoiturage->VILLEARRIVEE = $request->ville_arrivee;
        $covoiturage->DATEDEPART = $request->date_depart;
        $covoiturage->VOITUREPERSONNEL = $request->voiture_personnel;
        $covoiturage->NBPLACES = $request->nombre_places;
        $covoiturage->save();

        return response()->json($covoiturage, 200);
    }
    function storeNewExchangeOfSkill(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'echange_competences';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création du Nouvelle Echange de Compétences */
        $echange_competences = new EchangeCompetence();
        $echange_competences->IDSERVICE = $lastInsertedID + 1;
        $echange_competences->IDUTILISATEUR = $request->id_utilisateur;
        $echange_competences->COMPETENCE = $request->competence;
        $echange_competences->save();

        return response()->json($echange_competences, 200);
    }
    function storeNewAthleticEvent(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'evenement_sportif';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création du Nouvel Evenement Sportif */
        $evenement_sportif = new EvenementSportif();
        $evenement_sportif->IDSERVICE = $lastInsertedID + 1;
        $evenement_sportif->IDUTILISATEUR = $request->id_utilisateur;
        $evenement_sportif->NBPERSONNES = $request->nb_personnes;
        $evenement_sportif->save();

        return response()->json($evenement_sportif, 200);
    }
    function storeNewBookClub(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'lecture';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création de la Nouvelle Lecture */
        $lecture = new Lecture();
        $lecture->IDSERVICE = $lastInsertedID + 1;
        $lecture->IDUTILISATEUR = $request->id_utilisateur;
        $lecture->GENRELITTERAIRE = $request->genre_litteraire;
        $lecture->AUTEURLITTERAIRE = $request->auteur_litteraire;
        $lecture->TITRELITTERAIRE = $request->titre_litteraire;
        $lecture->save();

        return response()->json($lecture, 200);
    }
    function storeNewSpareTime(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'loisir';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création du Nouveau Loisir */
        $loisir = new Loisir();
        $loisir->IDSERVICE = $lastInsertedID + 1;
        $loisir->IDUTILISATEUR = $request->id_utilisateur;
        $loisir->NBPERSONNES = $request->nb_personnes;
        $loisir->ESTSPORTIF = $request->est_sportif;
        $loisir->save();

        return response()->json($loisir, 200);
    }
    function storeNewCinema(Request $request)
    {
        $lastInsertedID = Service::max('IDSERVICE');

        /* Création du Nouveau Service */
        $service = new Service();
        $service->IDUTILISATEUR = $request->id_utilisateur;
        $service->IDSERVICE = $lastInsertedID + 1;
        $service->TYPE = 'cinema';
        $service->LIBELLE = $request->libelle;
        $service->DESCRIPTION = $request->description;
        $service->NUMERO = $request->numero;
        $service->RUE = $request->rue;
        $service->CODEPOSTAL = $request->code_postal;
        $service->VILLE = $request->ville;
        $service->DATEPOSTER = date("Y-m-d H:i:s");
        $service->ESTDEMANDE = $request->est_une_demande;
        $service->COUT = $request->cout;
        $service->ETAT = 1;
        $service->save();

        /* Création du Nouveau Cinema */
        $cinema = new Cinema();
        $cinema->IDSERVICE = $lastInsertedID + 1;
        $cinema->IDUTILISATEUR = $request->id_utilisateur;
        $cinema->PRIXSUPP = $request->prix_supp;
        $cinema->NBPLACES = $request->nb_places;
        $cinema->save();

        return response()->json($cinema, 200);
    }

    function updateService(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $service = Service::find($request->id_service);

        if ($request->type != null) {
            $service->TYPE = $request->type;
        }
        if ($request->libelle != null) {
            $service->LIBELLE = $request->libelle;
        }
        if ($request->description != null) {
            $service->DESCRIPTION = $request->description;
        }
        if ($request->numero != null) {
            $service->NUMERO = $request->numero;
        }
        if ($request->rue != null) {
            $service->RUE = $request->rue;
        }
        if ($request->code_postal != null) {
            $service->CODE_POSTAL = $request->code_postal;
        }
        if ($request->ville != null) {
            $service->VILLE = $request->ville;
        }
        if ($request->est_demande != null) {
            $service->ESTDEMANDE = $request->est_demande;
        }
        if ($request->cout != null) {
            $service->COUT = $request->cout;
        }
        if ($request->etat != null) {
            $service->ETAT = $request->etat;
        }

        $service->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }

    function deleteService(Request $request)
    {

        /* Création du Nouvel Etudiant */
        $service = Service::find($request->id_service);

        $service->ETAT = 0;

        $service->save();

        /* Création du nouvel Etudiant */
        return response()->json(['success' => 'success'], 200);
    }
}
