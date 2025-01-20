<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Produit;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $produit = Produit::count();

        // for ($i = 0; $i < 17; $i++) {
            $produit = $produit + 1;
            Produit::create([
                'nom' => $produit,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut consectetur mollitia numquam nulla maiores sunt, perspiciatis autem veritatis quam amet expedita repellat sapiente. A fugit corrupti, consequuntur veritatis ipsam cupiditate.',
                'posologie' => 'Médicament à prendre deux fois par jour.',
                'image' => $produit.'.jpg',
                'categorie_id' => '3',
                'user_id' => '1',
                'statut_id' => '1',
            ]);
        // }
    }
}