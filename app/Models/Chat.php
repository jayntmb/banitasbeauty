<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
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

    public function responses() {
        return $this->hasMany(Response::class);
    }

}
