<?php

namespace App\Livewire\Admin;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlockArticleSlideEditor extends Component
{
    use WithFileUploads;

    public $showModal = false; // Contrôle l'affichage de la modale
    public $promoImages = [];
    public $addedArrivages = [];

    public $forPromo = false;
    public $forArrivage = false;

    public $existingPromos;
    public $existingArrivages;
    public $selectedPromoProducts = [];

    public $searchTerm = '';
    public $searchResults = [];

    public $nom_arrivage;
    public $description_arrivage;
    public $prix_arrivage;
    public $images_arrivages = [];

    public $categories ;
    public $categorie_id;

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

    public function addArrivage()
    {
        // Validation des champs
        $this->validate([
            'nom_arrivage' => 'required|string|max:255',
            'description_arrivage' => 'required|string',
            'prix_arrivage' => 'required|numeric|min:0',
            'images_arrivages' => 'required', // Au moins une image est requise
            'images_arrivages.*' => 'image|max:2048', // Chaque image doit être valide et ne pas dépasser 2 Mo
        ], [
            'nom_arrivage.required' => 'Le nom de l\'arrivage est requis.',
            'nom_arrivage.string' => 'Le nom de l\'arrivage doit être une chaîne de caractères.',
            'nom_arrivage.max' => 'Le nom de l\'arrivage ne doit pas dépasser 255 caractères.',
            'description_arrivage.required' => 'La description de l\'arrivage est requise.',
            'description_arrivage.string' => 'La description de l\'arrivage doit être une chaîne de caractères.',
            'prix_arrivage.required' => 'Le prix de l\'arrivage est requis.',
            'prix_arrivage.numeric' => 'Le prix de l\'arrivage doit être un nombre.',
            'prix_arrivage.min' => 'Le prix de l\'arrivage doit être supérieur ou égal à 0.',
            'images_arrivages.required' => 'Au moins une image est requise pour l\'arrivage.',
            'images_arrivages.array' => 'Les images doivent être fournies sous forme de tableau.',
            'images_arrivages.min' => 'Vous devez fournir au moins une image.',
            'images_arrivages.*.image' => 'Chaque fichier doit être une image valide.',
            'images_arrivages.*.max' => 'Chaque image ne doit pas dépasser 2 Mo.',
        ]);

        // Sauvegarder le produit
        $product = Produit::create([
            'nom' => $this->nom_arrivage,
            'categorie_id' => $this->categorie_id,
            'description' => $this->description_arrivage,
            'prix' => $this->prix_arrivage,
        ]);

        // Sauvegarder les images_arrivages
        if ($this->images_arrivages) {
            foreach ($this->images_arrivages as $index => $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/assets/images/produits', $imageName);

                // Determine the image column based on the index (0 for first_image, 1 for second_image, 2 for third_image)
                switch ($index) {
                    case 0:
                        $product->update(['first_image' => $imageName]);
                        break;
                    case 1:
                        $product->update(['second_image' => $imageName]);
                        break;
                    case 2:
                        $product->update(['third_image' => $imageName]);
                        break;
                }
            }
            // Ajouter le produit à la liste des produits ajoutés
            $this->addedArrivages[$product->nom] = $product->first_image;
        }


        // Réinitialiser les champs du formulaire
        // $this->reset(['nom_arrivage', 'description_arrivage', 'prix_arrivage', 'images']);
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
                    unset($this->addedArrivages[$product->nom]);
                    break;
            }
        }
    }

    public function render()
    {
        $this->existingPromos = Produit::where('is_promo', true)
            ->get();

        $this->categories = Categorie::all();

        $this->existingArrivages = Produit::where('is_arrivage', true)
            ->get();

        if ($this->existingPromos && $this->existingPromos->count() > 0) {
            foreach ($this->existingPromos as $value) {
                $this->promoImages[$value->nom] = $value->first_image;
            }
        }

        if ($this->existingArrivages && $this->existingArrivages->count() > 0) {
            foreach ($this->existingArrivages as $value) {
                $this->addedArrivages[$value->nom] = $value->first_image;
            }
        }
        return view('livewire.admin.block-article-slide-editor');
    }
}