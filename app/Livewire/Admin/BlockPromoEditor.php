<?php

namespace App\Livewire\Admin;

use App\Models\Produit;
use Livewire\Component;
use App\Models\BlockPromo;
use Livewire\WithFileUploads;

class BlockPromoEditor extends Component
{
    use WithFileUploads;

    public $searchTerm = '';
    public $searchResults = [];


    public $produit_id;
    public $product_name;
    public $description;
    public $image;
    public $newImage;
    public $imagePreview;

    public $showModal = false; // Contrôle l'affichage de la modale

    public function updatedSearchTerm()
    {
        $this->searchResults = Produit::where('nom', 'like', '%' . $this->searchTerm . '%')->limit(5)->get();
    }

    public function selectProduct($productId)
    {
        $product = Produit::findOrFail($productId);
        $this->produit_id = $productId;
        $this->product_name = $product->nom;
        $this->description = $product->description;
        $this->image = $product->first_image;
        $this->searchResults = [];
    }

    public function mount()
    {
        // Récupérer les données de la bannière
        $block_promo = BlockPromo::first();
        if ($block_promo) {
            $this->product_name = $block_promo->product_name;
            $this->description = $block_promo->description;
            $this->image = $block_promo->image;
        }
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function updateBlockPromo()
    {
        // Valider les données
        $this->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'newImage' => 'nullable|image|mimes:png,gif,bmp,svg,jpg,jpeg,webp|max:2048', // 2MB max
        ], [
            'product_name.required' => 'Le titre (ligne 1) est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'newImage.image' => 'Le fichier doit être une image.',
            'newImage.mimes' => 'Les formats autorisés sont : PNG, GIF, BMP, SVG, JPG, JPEG, WEBP.',
            'newImage.max' => 'La taille maximale de l\'image est de 2 Mo.',
        ]);

        // Mettre à jour la bannière
        $block_promo = BlockPromo::firstOrNew();
        $block_promo->produit_id = $this->produit_id;
        $block_promo->product_name = $this->product_name;
        $block_promo->description = $this->description;

        if ($this->newImage) {
            $allowedExtensions = [
                'png',
                'gif',
                'bmp',
                'svg',
                'wav',
                'mp4',
                'mov',
                'avi',
                'wmv',
                'mp3',
                'm4a',
                'jpg',
                'jpeg',
                'mpga',
                'webp',
                'wma',
            ];
            $fileExtension = $this->newImage->getClientOriginalExtension();

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                // Si l'extension n'est pas autorisée, afficher une erreur
                $this->addError('newImage', 'Les formats autorisés sont : PNG, GIF, BMP, SVG, JPG, JPEG, WEBP.');
                return;
            }
            // Générer un nom de fichier unique
            $fileName = $this->newImage->getClientOriginalName();

            $this->newImage->storeAs('images/block_promo', $fileName, 'public');

            // Mettre à jour le chemin de l'image dans la base de données
            $block_promo->image = 'images/block_promo/' . $fileName;
        } else {
            $block_promo->image = $this->image;
        }

        $block_promo->save();

        // Fermer la modale
        $this->closeModal();
    }

    public function render()
    {
        $blockpromo = BlockPromo::first();
        $this->produit_id = $blockpromo->id;
        $this->product_name = $blockpromo->product_name;
        $this->description = $blockpromo->description;
        
        return view('livewire.admin.block-promo-editor');
    }
}
