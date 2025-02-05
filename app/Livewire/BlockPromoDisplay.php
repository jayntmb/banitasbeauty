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

    public function render()
    {
        $this->block_promo_display = BlockPromo::first();
        return view('livewire.block-promo-display');
    }
}
