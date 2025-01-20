<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Categorie;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {

        $categories = Categorie::where('statut_id', 1)->orderBy('libelle', 'asc')->get();
        $chats = Chat::where('statut_id', 1)->where('client_id', Auth::user()->clients->first()?->id)->get();

        if (Auth::user()) {
            $paniers = Panier::where('state', 1)->where('user_id', Auth::user()->id)->count();

            session()->put('panier_count', $paniers);
        } else {
            session()->pull('panier_count');
        }
        session()->put('active', 9);

        return view('pages.notification', compact('categories', 'chats'));
    }

    public function store(Request $request)
    {

        if ($request->has('image') != null) {

            Chat::create([
                'image' => $request->file('image')->getClientOriginalName(),
                'statut_id' => '1',
                'client_id' => $request->client,
                'send_name' => 'user',
            ]);

            $request->file('image')->move(public_path('assets/images/chat/'), $request->file('image')->getClientOriginalName());
        }

        return back();
    }

}