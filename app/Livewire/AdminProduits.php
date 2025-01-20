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

    public $search = '', $categories;
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $filters  = [
        'categories' => []
    ];

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->categories = Categorie::orderby('libelle', 'asc')->get();
        $this->filters['categories'] = array_filter($this->filters['categories']);

        $query = Produit::query()
            ->where('nom', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc');


        if (!empty($this->filters['categories'])) {
            $query->whereIn('categorie_id', array_keys($this->filters['categories']));
        }

        return view('livewire.admin-produits', [
            'produits' => $query->paginate(12)->withQueryString(),
        ]);
    }
}