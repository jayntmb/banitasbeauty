<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Societe;
use App\Models\Contact;
use App\Models\Categorie;
use App\Models\SiteInfo;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function profil()
    {
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $info = SiteInfo::first();

        session()->put('active', '6');
        if (Auth::user()->role_id == 1) {
            return view('pages.profil-admin', compact('categories', 'info'));
        } else {
            return view('pages.profil', compact('categories'));
        }

    }

    public function create(Request $request)
    {
        $email_exist = User::where('email', $request->email)->first();
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();

        if ($email_exist != null) {
            if ($email_exist->statut_id == '1') {

                $content = json_encode([
                    'name' => 'Création du compte',
                    'statut' => 'error',
                    'message' => 'Cette adresse e-mail appartient à un compte actif !',
                ]);
                session()->flash(
                    'session',
                    $content
                );

            } else {
                $content = json_encode([
                    'name' => 'Création du compte',
                    'statut' => 'error',
                    'message' => 'Cette adresse e-mail appartient à un compte supendu ! Veuillez contacter l\'administrateur !',
                ]);

                session()->flash(
                    'session',
                    $content
                );
            }

            return back();
        }
        $email = $request->email;

        session()->pull('active');

        return view('inscription.inscription', compact('email', 'categories'));
    }

    public function password(Request $request)
    {
        if ($request->password == $request->password_confirm) {
            if (Hash::check($request->password_old, Auth::user()->password) == true) {
                User::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);

                $content = json_encode([
                    'name' => 'Mot de passe modifié',
                    'statut' => 'success',
                    'message' => 'Votre mot de passe a été modifié avec succès !',
                ]);

                session()->flash(
                    'session',
                    $content
                );

                return redirect()->route('dashboard');
            } else {
                $content = json_encode([
                    'name' => 'Mot de passe incorrect',
                    'statut' => 'error',
                    'message' => 'Votre ancien mot de passe est incorrect !',
                ]);

                session()->flash(
                    'session',
                    $content
                );
            }
        } else {
            $content = json_encode([
                'name' => 'Nouveau Mot de passe incorrect',
                'statut' => 'error',
                'message' => 'Votre nouveau mot de passe n\'est pas identique à sa confirmation !',
            ]);

            session()->flash(
                'session',
                $content
            );

        }

        return back();
    }
}