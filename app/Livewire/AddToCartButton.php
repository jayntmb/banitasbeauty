<?php

namespace App\Livewire;

use App\Models\Panier;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddToCartButton extends Component
{
    public $produitId;

    public function addToCart()
    {
        // Utilisateur non connecté, gérer via la session
        $cart = session('cart', []);

        if (array_key_exists($this->produitId, $cart)) {
            $cart[$this->produitId]['quantite'] += 1;
        } else {
            $produit = Produit::find($this->produitId);

            $cart[$this->produitId] = [
                'id' => $this->produitId,
                'quantite' => 1,
                'state' => 1,
                'details' => $produit ? $produit->toArray() : [],
            ];
        }

        session(['cart' => $cart]);
        
        // Émettre un événement pour mettre à jour l'icône du panier
        $this->dispatch('cartUpdated');
    }


    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
