<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevisClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($devis) {
            if (empty($devis->title)) {
                $monthYear = date('mY');
                $devis->title = 'Devis #' . (static::max('id') + 1) . Auth::id() . '/ ' . $monthYear;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function prix()
    {
        $som1 = $this->commandes->where('devise_id', '1')->sum('prix_total');
        $som2 = $this->commandes->where('devise_id', '2')->sum('prix_total');
        return $som1 . ' $ + ' . $som2 . ' FC ';
    }

    public function commandeclient()
    {
        return $this->hasOne(CommandeClient::class);
    }
}
