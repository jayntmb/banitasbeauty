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

    public function lot() {
        return $this->belongsTo(Lot::class);
    }

    public function paniers() {
        return $this->hasMany(Panier::class);
    }

    public function pivotProduitTags() {
        return $this->hasMany(PivotProduitTag::class);
    }

    public function pivotProduitUsers() {
        return $this->hasMany(PivotProduitUser::class);
    }

    public function commandes() {
        return $this->hasMany(Commande::class);
    }

}
