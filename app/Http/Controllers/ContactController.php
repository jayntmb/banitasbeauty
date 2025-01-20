<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Categorie;
use App\Models\Panier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'objet' => $request->objet,
            'message' => $request->message,
            'statut_id' => '1',
            'user_id' => Auth::user()->id ?? null,
        ]);

        $content = json_encode([
            'name' => 'Message',
            'statut' => 'success',
            'message' => 'Votre message a été envoyé avec succès !',
        ]);



        session()->flash(
            'session',
            $content
        );


        return back();
    }
}