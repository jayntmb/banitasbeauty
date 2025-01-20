<?php

namespace App\Http\Controllers\pedro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associe;
use App\Models\Partenaire;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\Categorie;

class indetificationController extends Controller
{
    public function  index(){
        $produits = Produit::where('statut_id', '1')->orderBy('nom', 'asc')->get();
        $partenaires = Partenaire::where('statut_id', '1')->get();
        $associes = Associe::where('statut_id', '1')->get();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        return view('auth.identification', compact('produits', 'partenaires', 'associes', 'categories'));

    }
}
