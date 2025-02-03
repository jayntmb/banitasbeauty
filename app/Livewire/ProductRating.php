<?php

namespace App\Livewire;

use App\Models\Rating;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductRating extends Component
{
    public $productId;
    public $rating;
    public $averageRating;
    public $totalRatings;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->updateRatingData();
    }

    public function rate($rating)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Enregistrer ou mettre à jour la note
        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'produit_id' => $this->productId,
            ],
            [
                'rating' => $rating,
            ]
        );

        // Mettre à jour les données d'affichage
        $this->updateRatingData();
    }

    private function updateRatingData()
    {
        $product = Produit::find($this->productId);
        $this->averageRating = $product->averageRating();
        $this->totalRatings = $product->ratings->count();
    }

    public function render()
    {
        return view('livewire.product-rating');
    }
}
