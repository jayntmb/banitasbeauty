<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index()
    {
        // Initialiser les variables

        $cart = collect(); // Collection vide pour les paniers
        $cartCount = 0; // Nombre d'articles dans le panier
        $cart_total_amount = 0; // Quantité totale du panier

        // Récupérer le panier depuis la session
        if (session('cart')) {
            $cart = session('cart');

            // Parcourir les éléments du panier en session
            foreach ($cart as $produitId => $data) {
                $prix = $data['details']['prix'] ?? 0;
                // Calculer la quantité totale
                $cart_total_amount += $data['quantite'] * $data['details']['prix'];
            }

            // Calculer le nombre d'articles actifs dans le panier
            $cartCount = count($cart);
        }

        // Stocker les statistiques dans la session
        session()->put('cart_count', $cartCount);
        session()->put('cart_total_amount', $cart_total_amount);

        // Récupérer les catégories actives
        $categories = Categorie::where('statut_id', '1')
            ->orderBy('libelle', 'asc')
            ->get();

        return view('panier.panier', compact('cart', 'categories'));
    }

    public function removeFromCart($produitId, Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$produitId])) {
            // Supprimer le produit de la session
            unset($cart[$produitId]);
            Session::put('cart', $cart);

            // Supprimer le produit de la base de données si l'utilisateur est connecté
            if (Auth::check()) {
                Panier::where('user_id', Auth::id())
                    ->where('produit_id', $produitId)
                    ->delete();
            }

            // Recalculer le total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['details']['prix'] * $item['quantite'];
            }

            // Retourner une réponse JSON
            return response()->json([
                'message' => 'Le produit a été retiré de votre panier avec succès !',
                'success' => true,
                'newTotal' => $total,
                'cartCount' => count($cart) // Nombre d'articles dans le panier
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function updateQuantity($produitId, Request $request)
    {
        $cart = Session::get('cart', []);
        $action = $request->input('action');

        if (isset($cart[$produitId])) {
            if ($action === 'increment') {
                $cart[$produitId]['quantite']++;
            } elseif ($action === 'decrement' && $cart[$produitId]['quantite'] > 1) {
                $cart[$produitId]['quantite']--;
            }

            Session::put('cart', $cart);

            // Recalculer le total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['details']['prix'] * $item['quantite'];
            }

            return response()->json([
                'message' => 'Panier mis à jour avec succès !',
                'success' => true,
                'newQuantity' => $cart[$produitId]['quantite'],
                'newTotal' => $total
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function emptyCart()
    {
        Session::put('cart', []);

        return back()->with('success','Le panier a été vidé avec succès !');
    }
}
