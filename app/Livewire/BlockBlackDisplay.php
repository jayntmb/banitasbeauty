<?php

namespace App\Livewire;

use App\Models\BlockBlack;
use Livewire\Component;

class BlockBlackDisplay extends Component
{
    public $blockBlack;

    public function render()
    {
        $this->blockBlack = BlockBlack::first();
        
        return view('livewire.block-black-display');
    }
}
