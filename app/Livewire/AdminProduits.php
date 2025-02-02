<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class AdminProduits extends Component
{
    use WithPagination;

    public $categories;

    public $filters  = [
        'categories' => []
    ];

    public function render()
    {
        $this->categories = Categorie::orderby('libelle', 'asc')->get();
        $this->filters['categories'] = array_filter($this->filters['categories']);

        $query = Produit::orderby('id', 'DESC');


        if (!empty($this->filters['categories'])) {
            $query->whereIn('categorie_id', array_keys($this->filters['categories']));
        }

        return view('livewire.admin-produits', [
            'produits' => $query->paginate(12),
        ]);
    }
}