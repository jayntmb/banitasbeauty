<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'commande_produits', 'commande_id', 'produit_id')->withPivot('quantite');
    }
}
