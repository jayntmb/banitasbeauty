<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlockIntro;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BlockIntroEditor extends Component
{
    use WithFileUploads;

    public $phrase1;
    public $phrase2;
    public $phrase3;
    public $phrase4;
    public $description;
    public $image1;
    public $video1;
    public $image2;
    public $video2;
    public $image3;
    public $video3;

    public $newImage1;
    public $newVideo1;
    public $newImage2;
    public $newVideo2;
    public $newImage3;
    public $newVideo3;

    public $showModal = false;

    public function mount()
    {
        // Récupérer les données du bloc
        $blockIntro = BlockIntro::first();
        if ($blockIntro) {
            $this->phrase1 = $blockIntro->phrase1;
            $this->phrase2 = $blockIntro->phrase2;
            $this->phrase3 = $blockIntro->phrase3;
            $this->phrase4 = $blockIntro->phrase4;
            $this->image1 = $blockIntro->image1;
            $this->video1 = $blockIntro->video1;
            $this->image2 = $blockIntro->image2;
            $this->video2 = $blockIntro->video2;
            $this->image3 = $blockIntro->image3;
            $this->video3 = $blockIntro->video3;
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

    public function updateBlockIntro()
    {
        // Valider les données
        $this->validate([
            'phrase1' => 'nullable|string|max:255',
            'phrase2' => 'nullable|string|max:255',
            'phrase3' => 'nullable|string|max:255',
            'phrase4' => 'nullable|string|max:255',
            'newImage1' => 'nullable|image|max:2048',
            'newVideo1' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:5120', // 5MB max
            'newImage2' => 'nullable|image|max:2048',
            'newVideo2' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:5120',
            'newImage3' => 'nullable|image|max:2048',
            'newVideo3' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:5120',
        ], [
            'phase1.string' => 'La phrase doit etre du texte.',
            'phase2.string' => 'La phrase doit etre du texte.',
            'phase3.string' => 'La phrase doit etre du texte.',
            'phase4.string' => 'La phrase doit etre du texte.',
            'newImage1.image' => 'Le fichier doit etre au format image',
            'newImage2.image' => 'Le fichier doit etre au format image',
            'newImage3.image' => 'Le fichier doit etre au format image',
            'newVideo1.mimetypes' => 'Veuillez choisir une video',
            'newVideo2.mimetypes' => 'Veuillez choisir une video',
            'newVideo3.mimetypes' => 'Veuillez choisir une video',
        ]);

        // Mettre à jour le bloc
        $blockIntro = BlockIntro::firstOrNew();

        // Mettre à jour les champs texte
        $blockIntro->phrase1 = $this->phrase1;
        $blockIntro->phrase2 = $this->phrase2;
        $blockIntro->phrase3 = $this->phrase3;
        $blockIntro->phrase4 = $this->phrase4;

        // Gérer les fichiers
        $this->handleFileUpload($blockIntro, 'image1', 'newImage1', 'images/block-intro');
        $this->handleFileUpload($blockIntro, 'video1', 'newVideo1', 'images/block-intro/videos');
        $this->handleFileUpload($blockIntro, 'image2', 'newImage2', 'images/block-intro');
        $this->handleFileUpload($blockIntro, 'video2', 'newVideo2', 'images/block-intro/videos');
        $this->handleFileUpload($blockIntro, 'image3', 'newImage3', 'images/block-intro');
        $this->handleFileUpload($blockIntro, 'video3', 'newVideo3', 'images/block-intro/videos');

        // Enregistrer les modifications
        $blockIntro->save();

        // Fermer la modale
        $this->closeModal();

        // Émettre un événement pour mettre à jour l'affichage
        $this->dispatch('blockIntroUpdated');
    }

    protected function handleFileUpload($blockIntro, $field, $newFile, $folder)
    {
        if ($this->$newFile) {
            // Supprimer l'ancien fichier s'il existe
            if ($blockIntro->$field && Storage::disk('public')->exists($blockIntro->$field)) {
                Storage::disk('public')->delete($blockIntro->$field);
            }

            $originalFilename = $this->$newFile->getClientOriginalName();
            $timestampedFilename = time() . '_' . $originalFilename;

            // Stocker le nouveau fichier
            $path = $this->$newFile->storeAs($folder, $timestampedFilename, 'public');
            $blockIntro->$field = $path;
        }
    }
    public function render()
    {
        return view('livewire.admin.block-intro-editor');
    }
}
