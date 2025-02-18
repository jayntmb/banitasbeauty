<?php

namespace App\Livewire;

use App\Models\Panier;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CartIcon extends Component
{
    public $panierCount = 0;

    public function mount()
    {
        $this->updatePanierCount();
    }

    #[On('cartUpdated')]
    public function updatePanierCount()
    {
        $this->panierCount = count(session('cart', []));
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
