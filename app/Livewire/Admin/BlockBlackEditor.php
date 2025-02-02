<?php

namespace App\Livewire\Admin;

use App\Models\BlockBlack;
use Livewire\Component;

class BlockBlackEditor extends Component
{
    public $showModal = false;
    public $title = "Soin de beauté amour de soi";
    public $description = "Offrez-vous le luxe d'une peau radieuse avec nos cosmétiques. Chaque application est une promesse de bien-être et de confiance. Ne laissez pas passer cette chance, commandez maintenant et faites un pas vers l'amour de vous-même !";

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function updateBlockBlack()
    {
        // Valider les données
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'title.required' => 'Le titre (ligne 1) est obligatoire.',
            'description.required' => 'La description est obligatoire.',
        ]);

        // Mettre à jour la bannière
        $blockBlack = BlockBlack::firstOrNew();
        $blockBlack->title = $this->title;
        $blockBlack->description = $this->description;

        $blockBlack->save();

        // Fermer la modale
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.block-black-editor');
    }
}
