<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MoveBundle;

class MoveBundleDisplay extends Component
{
    public $content;

    protected $listeners = ['moveBundleUpdated' => 'refreshMoveBundle'];

    public function mount()
    {
        $this->refreshMoveBundle();
    }

    public function refreshMoveBundle()
    {
        // Recharger les données de la bande passante
        $moveBundle = MoveBundle::first();
        $this->content = $moveBundle ? $moveBundle->content : 'Wonderful skin';
    }

    public function render()
    {
        return view('livewire.move-bundle-display');
    }
}