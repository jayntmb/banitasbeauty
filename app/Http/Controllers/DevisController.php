<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    public function store(Request $request)
    {
        try {
            //code...
            Devis::create([
                'message' => $request->message,
                'nom' => $request->nom,
                'societe' => $request->societe,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'adresse' => $request->adresse,
                'ville' => $request->ville,
                'province' => $request->province,
                'pays' => $request->pays,
                // 'client_id' => Auth::user()->id,
                'statut_id' => '1',
            ]);

            $content = json_encode([
                'name' => 'Devis',
                'statut' => 'success',
                'message' => 'Votre demande de devis a été envoyée avec succès !',
            ]);
        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Devis',
                'statut' => 'error',
                'message' => 'Votre demande de devis n\'a pas été envoyée, une erreur est survenue !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();

    }
}