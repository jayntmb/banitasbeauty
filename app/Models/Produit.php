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

    public function user(){
        return $this->belongsTo(User::class);
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
        return $this->hasMany(Commande::class);
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
