<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function chat(){
        return $this->belongsTo(Chat::class);
    }

}
