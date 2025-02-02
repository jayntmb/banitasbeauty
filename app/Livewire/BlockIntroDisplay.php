<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlockIntro;

class BlockIntroDisplay extends Component
{
    public $phrase1;
    public $phrase2;
    public $phrase3;
    public $phrase4;
    public $image1;
    public $video1;
    public $image2;
    public $video2;
    public $image3;
    public $video3;

    protected $listeners = ['blockIntroUpdated' => 'refreshBlockIntro'];

    public function mount()
    {
        $this->refreshBlockIntro();
    }

    public function refreshBlockIntro()
    {
        // Recharger les données du bloc
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

    public function render()
    {
        return view('livewire.block-intro-display');
    }
}
