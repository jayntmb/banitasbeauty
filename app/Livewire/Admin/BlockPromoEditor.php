<?php

namespace App\Livewire\Admin;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\BlockPromo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BlockPromoEditor extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $isNewProduct = true;

    // Propriétés pour un nouveau produit
    public $newProductName;
    public $newProductDescription;
    public $newProductPrice;
    public $newProductCategory;
    public $newProductImages = [];

    // Propriétés pour un produit existant
    public $searchQuery;
    public $searchResults = [];

    public $selectedProduct = [
        'id' => null,
        'nom' => '',
        'prix' => '',
        'description' => '',
        'first_image' => '',
    ];
    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function updatedSearchQuery()
    {
        $this->searchResults = Produit::where('nom', 'like', '%' . $this->searchQuery . '%')->get();
    }

    public function selectProduct($productId)
    {
        $product = Produit::find($productId);
        if ($product) {

            $sourceFile = public_path("storage/images/produits/" . $product->first_image);
            $destinationPath = "images/block_promo/";

            Storage::disk('public')->putFileAs($destinationPath, $sourceFile, $product->first_image);

            $this->selectedProduct = [
                'id' => $product->id,
                'nom' => $product->nom,
                'prix' => $product->prix,
                'description' => $product->description,
                'first_image' => $product->first_image,
            ];
        }
        $this->searchResults = [];
        $this->searchQuery = '';
    }

    public function addNewProduct()
    {
        $this->validate([
            'newProductName' => 'required|string|max:255',
            'newProductDescription' => 'required|string',
            'newProductPrice' => 'required|numeric',
            'newProductCategory' => 'required|exists:categories,id',
            'newProductImages.*' => 'image|mimes:png,gif,bmp,svg,jpg,jpeg,webp|max:2048',
        ]);

        // Générer un nom de fichier unique pour chaque image
        $firstImageName = $this->newProductImages[0] ? time() . '_' . $this->newProductImages[0]->getClientOriginalName() : null;
        $secondImageName = isset($this->newProductImages[1]) ? time() . '_' . $this->newProductImages[1]->getClientOriginalName() : null;
        $thirdImageName = isset($this->newProductImages[2]) ? time() . '_' . $this->newProductImages[2]->getClientOriginalName() : null;

        // Stocker les images dans le dossier public/storage/images/produits
        if ($this->newProductImages[0]) {
            $this->newProductImages[0]->storeAs('images/produits', $firstImageName, 'public');
            $this->newProductImages[0]->storeAs('images/block_promo', $firstImageName, 'public');
        }
        if (isset($this->newProductImages[1])) {
            $this->newProductImages[1]->storeAs('images/produits', $secondImageName, 'public');
        }
        if (isset($this->newProductImages[2])) {
            $this->newProductImages[2]->storeAs('images/produits', $thirdImageName, 'public');
        }

        // Créer le produit dans la base de données
        $product = Produit::create([
            'nom' => $this->newProductName,
            'description' => $this->newProductDescription,
            'prix' => $this->newProductPrice,
            'categorie_id' => $this->newProductCategory,
            'first_image' => $firstImageName,
            'second_image' => $secondImageName,
            'third_image' => $thirdImageName,
            'statut_id' => 1,
        ]);
        $this->selectedProduct['nom'] = $product->nom;
        $this->selectedProduct['description'] = $product->description;
        $this->selectedProduct['prix'] = $product->prix;
        $this->selectedProduct['first_image'] = $product->first_image;

        $this->updateBlockPromo($product->id);

        $this->closeModal();
    }

    public function selectExistingProduct()
    {
        $this->validate([
            'selectedProduct.id' => 'required|exists:produits,id',
        ]);

        $this->updateBlockPromo($this->selectedProduct['id']);

        $this->closeModal();
    }

    private function updateBlockPromo($productId)
    {
        $blockPromo = BlockPromo::firstOrNew();
        $blockPromo->produit_id = $productId;
        $blockPromo->product_name = $this->selectedProduct['nom'];
        $blockPromo->description = $this->selectedProduct['description'];
        $blockPromo->prix = $this->selectedProduct['prix'];
        $blockPromo->image = $this->selectedProduct['first_image'];
        $blockPromo->save();
    }

    public function render()
    {
        $existingBlockPromo = BlockPromo::first();
        if ($existingBlockPromo) {
            $this->selectedProduct['nom'] = $existingBlockPromo->product_name;
            $this->selectedProduct['description'] = $existingBlockPromo->description;
            $this->selectedProduct['prix'] = $existingBlockPromo->prix;
            $this->selectedProduct['first_image'] = $existingBlockPromo->image;
        }
        return view('livewire.admin.block-promo-editor', [
            'categories' => Categorie::all(),
        ]);
    }
}
