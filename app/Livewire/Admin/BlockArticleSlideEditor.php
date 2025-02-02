<?php

namespace App\Livewire\Admin;

use App\Models\Produit;
use Livewire\Component;

class BlockArticleSlideEditor extends Component
{
    public $showModal = false; // Contrôle l'affichage de la modale
    public $promoImages = [];
    public $arrivageImages = [];

    public $forPromo = false;
    public $forArrivage = false;

    public $existingPromos;
    public $existingArrivages;
    public $selectedPromoProducts = [];
    public $selectedArrivageProducts = [];

    public $searchTerm = '';
    public $searchResults = [];

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function updatedSearchTerm()
    {
        $this->searchResults = Produit::where('nom', 'like', '%' . $this->searchTerm . '%')->limit(5)->get();
    }

    public function displayFormPromo()
    {
        $this->forArrivage = false;
        $this->forPromo = true;
    }

    public function displayFormArrivage()
    {
        $this->forPromo = false;
        $this->forArrivage = true;
    }

    public function selectPromoProduct($productId)
    {
        if (!in_array($productId, $this->selectedPromoProducts)) {
            $this->selectedPromoProducts[] = $productId;
            $product = Produit::findOrFail($productId);
            $this->promoImages[$product->nom] = $product->first_image;
            $this->searchResults = [];
        }
    }

    public function selectArrivageProduct($productId)
    {
        if (!in_array($productId, $this->selectedArrivageProducts)) {
            $this->selectedArrivageProducts[] = $productId;
            $product = Produit::findOrFail($productId);
            $this->arrivageImages[$product->nom] = $product->first_image;
            $this->searchResults = [];
        }
    }

    public function updateBlockPromos()
    {
        if (!empty($this->selectedPromoProducts)) {
            foreach (array_unique($this->selectedPromoProducts) as $value) {
                $produit = Produit::find($value);
                if ($produit) {
                    $produit->update([
                        'is_promo' => true
                    ]);
                    $produit->save();
                }

            }
        }

        if (!empty($this->selectedArrivageProducts)) {
            foreach (array_unique($this->selectedArrivageProducts) as $value) {
                $produit = Produit::find($value);
                if ($produit) {
                    $produit->update([
                        'is_arrivage' => true
                    ]);
                    $produit->save();
                }

            }
        }

        // Fermer la modale
        $this->closeModal();
    }

    public function removeProduct($name, $source)
    {
        $product = Produit::where('nom', 'like', '%' . $name . '%')->first();
        if ($product) {
            switch ($source) {
                case 'fromPromo':
                    $product->update([
                        'is_promo' => false
                    ]);
                    unset($this->promoImages[$product->nom]);
                    break;

                case 'fromArrivage':
                    $product->update([
                        'is_arrivage' => false
                    ]);
                    unset($this->arrivageImages[$product->nom]);
                    break;
            }
        }
    }

    public function render()
    {
        $this->existingPromos = Produit::where('is_promo', true)
            ->get();

        $this->existingArrivages = Produit::where('is_arrivage', true)
            ->get();

        if ($this->existingPromos && $this->existingPromos->count() > 0) {
            foreach ($this->existingPromos as $value) {
                $this->promoImages[$value->nom] = $value->first_image;
            }
        }

        if ($this->existingArrivages && $this->existingArrivages->count() > 0) {
            foreach ($this->existingArrivages as $value) {
                $this->arrivageImages[$value->nom] = $value->first_image;
            }
        }
        return view('livewire.admin.block-article-slide-editor');
    }
}
