<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;

class BlockArticleSlideDisplay extends Component
{
    public $produits;

    public function render()
    {
        $this->produits = Produit::where('is_arrivage', true)
            ->orWhere('is_promo', true)
            ->get();

        return view('livewire.block-article-slide-display');
    }
}