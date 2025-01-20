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
        $users = User::where('role_id', '5')->orderBy('nom', 'asc')->get();
        $utilisateur = User::where('id', '0')->first();
        $categories = Categorie::where('statut_id', '1')->get();
        $partenaires = Partenaire::all();

        return view('admin.pages.clients', compact('users', 'utilisateur', 'categories','partenaires'));
    }

    public function clientactivation($id)
    {
        $user = User::find($id);

        if($user->active == 0){
            $user->update(['active' => 1]);
        }else{
            $user->update(['active' => 0]);
        }
        return back();

    }
}