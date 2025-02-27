<?php

namespace App\Livewire;

use App\Models\Panier;
use App\Models\Produit;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cart = [];
    public $total = 0;

    #[On('cartUpdated')]
    public function mount()
    {
        // Charger le panier uniquement depuis la session
        $this->cart = session('cart', []);

        // Calculer le total initial
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->cart as $item) {
            $this->total += $item['details']['prix'] * $item['quantite'];
        }
    }

    public function addToCart($produitId, $quantite = 1)
    {
        $produit = Produit::findOrFail($produitId);

        // Ajouter le produit à la session
        if (isset($this->cart[$produitId])) {
            $this->cart[$produitId]['quantite'] += $quantite;
        } else {
            $this->cart[$produitId] = [
                'quantite' => $quantite,
                'details' => $produit->toArray(),
            ];
        }

        // Mettre à jour la session
        session(['cart' => $this->cart]);

        // Mettre à jour la base de données uniquement si l'utilisateur est connecté
        if (Auth::check()) {
            Panier::updateOrCreate(
                ['user_id' => Auth::id(), 'produit_id' => $produitId],
                ['quantite' => $this->cart[$produitId]['quantite']]
            );
        }

        // Recalculer le total
        $this->calculateTotal();
    }

    public function removeFromCart($produitId)
    {
        if (isset($this->cart[$produitId])) {
            unset($this->cart[$produitId]);
            session(['cart' => $this->cart]);

            // Supprimer le produit de la base de données si l'utilisateur est connecté
            if (Auth::check()) {
                Panier::where('user_id', Auth::id())
                    ->where('produit_id', $produitId)
                    ->delete();
            }

            // Recalculer le total
            $this->calculateTotal();
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
