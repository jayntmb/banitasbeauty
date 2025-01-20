<?php

namespace App\Http\Controllers;

use App\Models\CommandeClient;
use App\Models\DevisClient;
use App\Models\Panier;
use App\Models\Categorie;
use App\Models\Chat;
use App\Models\Commande;
use App\Models\SiteInfo;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $categories = Categorie::where('statut_id', '1')->orderBy('libelle', 'asc')->get();
        $chats = Chat::where('statut_id', '1')->orderBy('id', 'desc')->get();
        $messages = Message::where('client_id', Auth::user()->clients?->first()?->id)->get();

        if (Auth::user()) {
            $paniers = Panier::where('state', '1')->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', '5');
        session()->put('panier_count', $paniers);
        $user = Auth::user();

        return view('dashboard', compact('categories', 'chats', 'messages'));
    }

    public function updatesiteinfo(Request $request)
    {
        SiteInfo::first()->update([
            'addresse' => $request->siteadd,
            'email' => $request->siteemail,
            'phone' => $request->sitephone,
            'taux' => $request->taux,
            'phone_wh' => $request->whatsapp
        ]);

        return back();
    }

    public function inactive()
    {
        return view('inactive');
    }
}
