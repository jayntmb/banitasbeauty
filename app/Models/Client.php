<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chats() {
        return $this->hasMany(Chat::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }
    public function commandes() {
        return $this->hasMany(Commande::class);
    }

}
