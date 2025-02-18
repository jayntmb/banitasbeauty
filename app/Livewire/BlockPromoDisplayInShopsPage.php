<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlockPromo;

class BlockPromoDisplayInShopsPage extends Component
{
    public $block_promo_display;

    public $image;
    public $product_name;
    public $description;

    public function render()
    {
        $this->block_promo_display = BlockPromo::first();
        return view('livewire.block-promo-display-in-shops-page');
    }
}
