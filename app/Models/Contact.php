<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function associes() {
        return $this->hasMany(Associe::class);
    }

    public function partenaires() {
        return $this->hasMany(Partenaire::class);
    }

}
