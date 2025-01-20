<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setPrixAttribute($value)
    {
        $this->attributes['prix'] = $value;
        if (isset($this->attributes['quantite'])) {
            $this->attributes['prix_total'] = $this->attributes['prix'] * $this->attributes['quantite'];
        }
    }

    public function setQuantiteAttribute($value)
    {
        $this->attributes['quantite'] = $value;
        if (isset($this->attributes['prix'])) {
            $this->attributes['prix_total'] = $this->attributes['prix'] * $this->attributes['quantite'];
        }
    }

    public function getPrixTotalAttribute($value)
    {
        if (isset($this->attributes['quantite']) && isset($this->attributes['prix'])) {
            return $this->attributes['prix'] * $this->attributes['quantite'];
        }
        return;
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function devis()
    {
        return $this->belongsTo(DevisClient::class);
    }

    public function devise()
    {
        return $this->belongsTo(Devise::class);
    }

    public function prixTotal()
    {
        $p = $this->prix;
        $q = $this->quantite;

        return (int) $p * (int) $q;
    }

}