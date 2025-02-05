<?php

namespace App\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class BannerEditor extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $newImage;
    public $imagePreview;

    public $showModal = false; // Contrôle l'affichage de la modale

    public function mount()
    {
        // Récupérer les données de la bannière
        $banner = Banner::first();
        if ($banner) {
            $this->title = $banner->title;
            $this->description = $banner->description;
            $this->image = $banner->image;
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

    public function updateBanner()
    {
        // Valider les données
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'newImage' => 'nullable|image|mimes:png,gif,bmp,svg,jpg,jpeg,webp|max:2048', // 2MB max
        ], [
            'title.required' => 'Le titre (ligne 1) est obligatoire.',
            'title.max' => 'Le titre (ligne 1) ne doit pas dépasser 255 caractères.',
            'description.required' => 'La description est obligatoire.',
            'newImage.image' => 'Le fichier doit être une image.',
            'newImage.mimes' => 'Les formats autorisés sont : PNG, GIF, BMP, SVG, JPG, JPEG, WEBP.',
            'newImage.max' => 'La taille maximale de l\'image est de 2 Mo.',
        ]);

        // Mettre à jour la bannière
        $banner = Banner::firstOrNew();
        $banner->title = $this->title;
        $banner->description = $this->description;

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
            $fileName = time() . '_' . $this->newImage->getClientOriginalName();

            $this->newImage->storeAs('images/banners', $fileName, 'public');

            // Mettre à jour le chemin de l'image dans la base de données
            $banner->image = $fileName;
        }

        $banner->save();

        // Fermer la modale
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.banner-editor');
    }
}
