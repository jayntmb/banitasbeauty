<?php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class BannerDisplay extends Component
{
    public $banner;

    public function mount()
    {
        $this->refreshBanner();
    }

    #[On('bannerUpdated')]
    public function refreshBanner()
    {
        // Recharger les données de la bannière
        $this->banner = Banner::first();
    }

    public function render()
    {
        return view('livewire.banner-display');
    }
}