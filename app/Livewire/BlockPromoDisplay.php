<?php

namespace App\Livewire;

use App\Models\BlockPromo;
use Livewire\Component;

class BlockPromoDisplay extends Component
{
    public $block_promo_display;

    public $image;
    public $product_name;
    public $description;

    public function mount()
    {
        $this->refreshBlockPromo();
    }

    public function refreshBlockPromo()
    {
        $this->block_promo_display = BlockPromo::first();
    }

    public function render()
    {
        return view('livewire.block-promo-display');
    }
}