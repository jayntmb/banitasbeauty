<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            // Récupérer les paniers de l'utilisateur
            $mypaniers = Panier::where('user_id', $user->id)
                ->where('state', '1')
                ->orderBy('id', 'desc')
                ->get();

            // Compter les paniers actifs et calculer la quantité totale
            $panierStats = Panier::where('user_id', $user->id)
                ->where('state', '1')
                ->selectRaw('COUNT(*) as count, SUM(quantite) as total_quantity')
                ->first();

            // Stocker les statistiques dans la session
            session()->put('panier_count', $panierStats->count);
            session()->put('panier_count_total', $panierStats->total_quantity ?? 0);
        } else {
            $mypaniers = collect(); // Tableau vide si pas d'utilisateur
            session()->forget(['panier_count', 'panier_count_total']);
        }

        // Récupérer les catégories actives
        $categories = Categorie::where('statut_id', '1')
            ->orderBy('libelle', 'asc')
            ->get();

        return view('panier.panier', compact('mypaniers', 'categories'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $panier = Panier::where('produit_id', $request->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($panier != null) {
            $quantite = $panier->quantite + $request->quantite;
            if ($panier->quantite > 1) {
                $content = json_encode([
                    'name' => 'Panier',
                    'statut' => 'error',
                    'message' => 'Le produit existe déjà dans le panier !',
                ]);
            } else {
                $panier->update([
                    'quantite' => $quantite,
                    'state' => '1',
                    'user_id' => Auth::user()->id,
                    'produit_id' => $request->id,
                ]);

                $content = json_encode([
                    'name' => 'Panier',
                    'statut' => 'success',
                    'message' => 'Le produit a été ajouté dans le panier !',
                ]);
            }
        } else {
            $panier = Panier::create([
                'quantite' => $request->quantite,
                'state' => '1',
                'user_id' => Auth::user()->id,
                'produit_id' => $request->id,
            ]);

            $content = json_encode([
                'name' => 'Panier',
                'statut' => 'success',
                'message' => 'Le produit a été ajouté dans le panier !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('panier.index');
    }

    public function show(Panier $panier)
    {
        //
    }

    public function edit(Panier $panier)
    {
        //
    }

    public function update(Request $request)
    {
        Panier::find($request->panier_id)
            ->update([
                'quantite' => $request->quantite,
                'state' => '1',
                'user_id' => Auth::user()->id,
                'produit_id' => $request->produit_id,
            ]);
        return back();
    }

    public function destroy($id)
    {
        $panier = Panier::where('produit_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($panier) {
            $panier->delete();

            session()->flash('session', json_encode([
                'name' => 'Panier',
                'statut' => 'success',
                'message' => 'Le produit ' . $panier->produit->nom . ' a été supprimé du panier !',
            ]));
        } else {
            session()->flash('session', json_encode([
                'name' => 'Panier',
                'statut' => 'error',
                'message' => 'Le produit n\'existe pas dans votre panier !',
            ]));
        }

        return redirect()->route('panier.index');
    }

    public function updateQuantity(Request $request)
    {
        $panier = Panier::find($request->id);

        if ($panier && $panier->user_id === Auth::id()) {
            $panier->quantite = $request->quantite;
            $panier->save();

            // Calculer le total général du panier
            $newTotal = Panier::where('user_id', Auth::user()->id)
                ->get()
                ->sum(fn($p) => $p->produit->prix * $p->quantite);

            return response()->json([
                'status' => 'success',
                'message' => 'Quantité mise à jour avec succès.',
                'total' => $panier->quantite * $panier->produit->prix,
                'new_total' => number_format($newTotal, 2),
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Impossible de mettre à jour la quantité.',
        ], 400);
    }

}