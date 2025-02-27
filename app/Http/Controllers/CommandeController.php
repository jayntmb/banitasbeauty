<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\DevisClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index($tab = null)
    {
        $commandes = Commande::where('user_id', Auth::id())->get();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();

        return view('pages.commandes', compact('commandes'));
    }

    public function valider(Request $request)
    {
        $commandes = session('cart', []);

        return view('pages.passer-commande', compact('commandes'));
    }

    public function confirmOrder(Request $request, Commande $commande)
    {
        try {
            $commande->update([
                'client_confirmation' => true
            ]);
            return redirect()->route('home')->with('success', 'Merci de nous faire confiance !');
        } catch (\Throwable $th) {
            Log::error("Une erreur s'est produite lors de la confirmation de la commande par le client : $th");
        }
    }
}
