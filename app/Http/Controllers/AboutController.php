<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Image;
use App\Models\Panier;
use App\Models\Categorie;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $admins = Admin::where('statut_id', '1')->get();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $images = Image::find(['9', '10', '11', '13']);
        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '1');

        return view('pages.about', compact('categories', 'admins', 'images'));
    }

}