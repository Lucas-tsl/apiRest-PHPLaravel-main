<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function getAllMessages(Request $request){
        $messages = Message::where('IDSERVICE', $request->id_service)
            ->where(function ($query) use ($request) {
                $query->where('IDUTILISATEUR', $request->id_utilisateur)
                      ->orWhere('IDUTILISATEUR_1', $request->id_utilisateur);
            })
            ->get();
    
        if ($messages->isEmpty()) {
            return response()->json("Conversation Introuvable", 404);
        } else {
            return response()->json($messages, 200);
        }
    }
}
