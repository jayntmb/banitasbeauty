<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Image;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngagementController extends Controller
{
    public function index()
    {
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $images = Image::find(['14', '15', '16', '17']);
        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '3');

        return view('pages.engagements', compact('categories', 'images'));
    }
}