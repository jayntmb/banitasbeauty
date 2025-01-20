<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($devis) {
            if (empty($devis->title)) {
                $monthYear = date('mY');
                $devis->title = 'Commande #' . (static::max('id') + 1) . Auth::id() . '/' . $monthYear;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function devis()
    {
        return $this->hasOne(DevisClient::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }
}