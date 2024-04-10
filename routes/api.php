<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/services', [ServiceController::class, "getAllServices"]);
Route::get('/activeservices', [ServiceController::class, "getAllActiveServices"]);
Route::get('/carpools', [ServiceController::class, "getAllCarpools"]);
Route::get('/skills', [ServiceController::class, "getAllExchangeOfSkills"]);
Route::get('/athletic', [ServiceController::class, "getAllAthleticEvents"]);
Route::get('/bookclub', [ServiceController::class, "getAllBookClubs"]);
Route::get('/sparetime', [ServiceController::class, "getAllSpareTimes"]);
Route::get('/cinema', [ServiceController::class, "getAllCinemas"]);
Route::get('/students', [EtudiantController::class, "getAllStudents"]);
Route::get('/classes', [ClasseController::class, "getAllClasses"]);
Route::get('/formations', [FormationController::class, "getAllFormations"]);
Route::get('/messages', [MessageController::class, "getAllMessages"]);
Route::get('/offers', [OffreController::class, "getAllOffersforOneService"]);

Route::post('/carpools', [ServiceController::class, "storeNewCarpool"]);
Route::post('/skills', [ServiceController::class, "storeNewExchangeOfSkill"]);
Route::post('/athletic', [ServiceController::class, "storeNewAthleticEvent"]);
Route::post('/bookclub', [ServiceController::class, "storeNewBookClub"]);
Route::post('/sparetime', [ServiceController::class, "storeNewSpareTime"]);
Route::post('/cinema', [ServiceController::class, "storeNewCinema"]);
Route::post('/students', [EtudiantController::class, "storeNewStudent"]);
Route::post('/classes', [ClasseController::class, "storeNewClasse"]);
Route::post('/formations', [FormationController::class, "storeNewFormation"]);
Route::post('/offers', [OffreController::class, "storeNewOffer"]);

Route::put('/services', [ServiceController::class, "updateService"]);
Route::put('/students', [EtudiantController::class, "updateStudent"]);
Route::put('/classes', [ClasseController::class, "updateClasse"]);
Route::put('/formations', [FormationController::class, "updateFormation"]);

Route::delete('/services', [ServiceController::class, "deleteService"]);
Route::delete('/students', [EtudiantController::class, "deleteStudent"]);
Route::delete('/classes', [ClasseController::class, "deleteClasse"]);
Route::delete('/formations', [FormationController::class, "deleteFormation"]);