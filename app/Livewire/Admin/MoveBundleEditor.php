<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MoveBundle;

class MoveBundleEditor extends Component
{
    public $content;
    public $showModal = false;

    public function mount()
    {
        // Récupérer les données de la bande passante
        $moveBundle = MoveBundle::first();
        if ($moveBundle) {
            $this->content = $moveBundle->content;
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

    public function updateMoveBundle()
    {
        // Valider les données
        $this->validate([
            'content' => 'required|string',
        ], [
            'content.required' => 'La bande defilante doit avoir du texte ',
            'content.string' => 'La bande defilante ne peut contenir que du texte ',
        ]);

        // Mettre à jour la bande passante
        $moveBundle = MoveBundle::firstOrNew();
        $moveBundle->content = $this->content;
        $moveBundle->save();

        // Fermer la modale
        $this->closeModal();

        // Émettre un événement pour mettre à jour l'affichage
        $this->dispatch('moveBundleUpdated');
    }

    public function render()
    {
        return view('livewire.admin.move-bundle-editor');
    }
}