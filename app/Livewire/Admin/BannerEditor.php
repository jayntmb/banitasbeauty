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

    public $titleLine1;
    public $titleLine2;
    public $description;
    public $buttonText;
    public $buttonLink;
    public $image;
    public $newImage;

    public $showModal = false; // Contrôle l'affichage de la modale

    public function mount()
    {
        // Récupérer les données de la bannière
        $banner = Banner::first();
        if ($banner) {
            $this->titleLine1 = $banner->title_line1;
            $this->titleLine2 = $banner->title_line2;
            $this->description = $banner->description;
            $this->buttonText = $banner->button_text;
            $this->buttonLink = $banner->button_link;
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
            'titleLine1' => 'required|string|max:255',
            'titleLine2' => 'required|string|max:255',
            'description' => 'required|string',
            'buttonText' => 'required|string|max:255',
            'buttonLink' => 'required|string|max:255',
            'newImage' => 'nullable|image|max:2048', // 2MB max
        ]);

        // Mettre à jour la bannière
        $banner = Banner::firstOrNew();
        $banner->title_line1 = $this->titleLine1;
        $banner->title_line2 = $this->titleLine2;
        $banner->description = $this->description;
        $banner->button_text = $this->buttonText;
        $banner->button_link = $this->buttonLink;

        if ($this->newImage) {
            // Générer un nom de fichier unique
            $fileName = $this->newImage->getClientOriginalName();

            $this->newImage->storeAs('images/banners', $fileName, 'public');

            // Mettre à jour le chemin de l'image dans la base de données
            $banner->image = 'images/banners/' . $fileName;
        }

        $banner->save();

        // Fermer la modale
        $this->closeModal();

        // Émettre un événement pour mettre à jour l'affichage
        $this->dispatch('bannerUpdated')->to('banner-display');
        Log::info('Événement bannerUpdated émis');
    }

    #[On('bannerUpdated')]
    public function refreshBanner()
    {
        Log::info('Événement bannerUpdated reçu dans BannerDisplay');
    }

    public function render()
    {
        return view('livewire.admin.banner-editor');
    }
}