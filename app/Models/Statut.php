<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function abouts() {
        return $this->hasMany(About::class);
    }

    public function admins() {
        return $this->hasMany(Admin::class);
    }

    public function associes() {
        return $this->hasMany(Associe::class);
    }

    public function categories() {
        return $this->hasMany(Categorie::class);
    }

    public function certifications() {
        return $this->hasMany(Certification::class);
    }

    public function chats() {
        return $this->hasMany(Chat::class);
    }

    public function clients() {
        return $this->hasMany(Client::class);
    }

    public function commandes() {
        return $this->hasMany(Commande::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function devis() {
        return $this->hasMany(Devis::class);
    }

    public function lots() {
        return $this->hasMany(Lot::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function newsletters() {
        return $this->hasMany(Newsletter::class);
    }

    public function partenaires() {
        return $this->hasMany(Partenaire::class);
    }

    public function pivotProduitTags() {
        return $this->hasMany(PivotProduitTag::class);
    }

    public function pivotProduitUsers() {
        return $this->hasMany(PivotProduitUser::class);
    }

    public function produits() {
        return $this->hasMany(Produit::class);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public function roles() {
        return $this->hasMany(Role::class);
    }

    public function societes() {
        return $this->hasMany(Societe::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
