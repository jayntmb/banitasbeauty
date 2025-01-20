<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Panier;
use App\Models\Categorie;
use App\Models\CommandeClient;
use App\Models\DevisClient;
use App\Models\User;
use App\Notifications\NewCommande;
use App\Notifications\NewDevis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index($tab = null)
    {
        $commandes = Commande::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $devis = DevisClient::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();

        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '7');

        return view('pages.commandes', compact('categories', 'commandes', 'devis', 'tab'));
    }

    public function clientcommandes($tab = null)
    {
        $commandes = CommandeClient::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        session()->put('active', '8');

        return view('pages.commandes-client', compact('commandes', 'tab'));
    }

    public function passagecommande(Request $request, $id)
    {
        $devis = DevisClient::find($id);

        if ($devis->user->id == Auth::user()->id) {
            # code...
            $cc = CommandeClient::where('devis_client_id', $devis->id)->first();
            return view('pages.passer-commande', compact('devis'));
        } else {
            return redirect(route('home'))->with('Error', 'Accès non autorisé');
        }
    }
    public function passercommande(Request $request)
    {
        $me = User::where('id', $request->user_id)->first();
        if ($request->user_id == Auth::user()->id) {
            # code...
            try {
                $devis = DevisClient::find($request->devis_id);
                $detail = [];
                foreach ($request->commande as $key => $c) {
                    if ($request->commande[$key] != null) {
                        $commande = new Commande();
                        $commande->nom = $c['nom'];
                        $commande->quantite = $c['quantite'];
                        $commande->symbole = $c['symbole'];
                        $commande->prix = $c['prix'];
                        $commande->prix_total = $c['prix_total'];
                        $detail[] = $commande; // Ajout de la commande à la fin du tableau
                    }
                }
                $detail = json_encode($detail);
                $ca = CommandeClient::create([
                    'user_id' => $request->user_id,
                    'statut_id' => "2",
                    'devis_client_id' => $devis->id,
                    'detail' => $detail
                ]);
                $devis->update([
                    'commande_client_id' => $ca->id
                ]);

                foreach (User::where('role_id', 1)->get() as $key => $user) {
                    // notification::create([
                    //     'subject' => 'Nouvelle Commande',
                    //     'message' => 'Vous avez reçu une nouvelle Commande de la part de ' . Auth::user()->prenom . ' ' . Auth::user()->nom,
                    //     'user_id' => $user->id,
                    // ]);
                    $user->notify(new NewCommande($me));
                }

                return redirect()->route('commandes.client', ['tab' => 1])->with('success', 'Commande enregistrée !!! Passez à la caisse pour payer');

            } catch (\Throwable $th) {
                return back()->with("Error", "Une Erreur s'est produite");
            }
        } else {
            # code...
            return redirect(route('home'))->with("Error", "Vous n'avez pas accès à ce contenu");
        }



    }

    public function deletecommande($id)
    {
        $cmd = CommandeClient::find($id);

        if (Auth::user()->id == $cmd->user_id) {
            $cmd->delete();
        }
        return back()->with("Error", "Accès non autorisé");
    }

    public function deletedevis($id)
    {
        $dc = DevisClient::find($id);
        if (Auth::user()->id == $dc->user_id) {
            $dc->delete();
        }
        return back()->with("Error", "Accès non autorisé");
    }

    public function valider()
    {
        try {
            $paniers = Panier::where('user_id', Auth::user()->id)->get();
            $me = User::where('id', Auth::user()->id)->first();
            foreach ($paniers as $panier) {
                Commande::create([
                    'quantite' => $panier->quantite,
                    'produit_id' => $panier->produit_id,
                    'user_id' => Auth::user()->id,
                    'statut_id' => '1',
                ]);
            }
            ;

            Panier::where('user_id', Auth::user()->id)->delete();

            foreach (User::where('role_id', 1)->get() as $key => $user) {
                $user->notify(new NewDevis($me));
            }

            $content = json_encode([
                'name' => 'Devis demandé',
                'statut' => 'success',
                'message' => 'Demande de devis envoyé avec succès ! Merci de nous faire confiance !',
            ]);
        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Devis demandé sans succès',
                'statut' => 'error',
                'message' => 'Demande de devis n\'a pas été envoyé  ! Réessayez svp !',
            ]);
        }

        session()->get(
            'session',
            $content
        );

        return back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Commande $commande)
    {
        //
    }

    public function edit(Commande $commande)
    {
        //
    }

    public function update(Request $request, Commande $commande)
    {
        //
    }

    public function destroy(Commande $id)
    {
        $cmd = Commande::find($id);
        if ($cmd->user_id == Auth::user()->id) {
            $cmd->delete();
            return back();
        } else {
            return back()->with("Error", "Accès non autorisé");
        }


    }
}