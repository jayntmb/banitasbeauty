<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        Newsletter::create([
            'email' => $request->email,
            'statut_id' => '1',
        ]);

        $content = json_encode([
            'name' => 'Demande d\'inscription',
            'statut' => 'error',
            'message' => 'Nous avons bien reçu votre demande d\'inscription. Un message a été envoyé à votre adresse e-mail. Merci et à bientôt !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return back();

    }
}