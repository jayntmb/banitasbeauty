<?php

namespace App\Http\Controllers;

use App\Models\Associe;
use App\Models\Image;
use App\Models\Partenaire;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function index()
    {
        $produits = Produit::where('statut_id', '1')
            ->latest()
            ->skip(1)
            ->take(4)
            ->get();
        $partenaires = Partenaire::where('statut_id', '1')->get();
        $associes = Associe::where('statut_id', '1')->get();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $images = Image::find([1, 2, 3]);
        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '0');
        return view('accueil.accueil', compact('produits', 'images', 'partenaires', 'associes', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
