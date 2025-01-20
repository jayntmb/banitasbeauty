<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::where('statut_id', '1')->orderBy('nom', 'asc')->paginate(perPage: 12);
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $arrivages = Produit::where('is_arrivage', '1')->orderBy('nom', 'asc')->get();

        return view('boutique.boutique', compact('produits', 'categories', 'arrivages'));
    }

    public function categorie($materiel, $id)
    {
        $produits = Produit::where('statut_id', '=', '1')->where('categorie_id', $id)->paginate(20);
        ;
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();

        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '2');
        $active = $id;
        return view('pages.produits', compact('produits', 'categories', 'active'));
    }

    public function recherche(Request $request)
    {
        $produits = Produit::where('nom', 'like', '%' . $request->input('value') . '%')->paginate(12);

        return response()->json($produits);
    }

    public function show(Produit $produit)
    {
        $productsInSameCategory = Produit::where('categorie_id', $produit->categorie_id)->where('id', '!=', $produit->id)->get();
        return view('detail-produit.detail-produit', compact('produit', 'productsInSameCategory'));
    }
}