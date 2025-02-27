<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function paniers() {
        return $this->hasMany(Panier::class);
    }

    public function pivotProduitUsers() {
        return $this->hasMany(PivotProduitUser::class);
    }

    public function commandes() {
        return $this->belongsToMany(Produit::class, 'commande_produits', 'produit_id', 'commande_id')->withPivot('quantite');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
