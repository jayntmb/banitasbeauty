<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role_id', '2')->with('commandes')->latest()->get(); 
        // le role 2 correspond au role client

        return view('admin.pages.clients', compact('clients'));
    }

    public function clientactivation($id)
    {
        $user = User::find($id);

        if ($user->statut->libelle == "active") {
            $user->update(['statut_id' => 2]); // l'id 2 correspond au statut 'inactive'
            return back()->with('success', 'Le compte du client a été suspendu; vous pouvez le réactiver à tout moment. ');
        } else {
            $user->update(['statut_id' => 1]); // l'id 1 correspond au statut 'active'
            return back()->with('success', "Le compte du client $user->prenom a été réactivé avec succès !");
        }
    }
}
