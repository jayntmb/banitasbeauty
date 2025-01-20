<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommandeClient;
use App\Models\User;
use App\Notifications\CommandeDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeClientController extends Controller
{
    public function index()
    {
        $users = User::whereHas('commandeclient')->orderBy('id', 'desc')->get();
        $commandes = CommandeClient::orderBy('id', 'desc')->get();

        return view('admin.pages.comandes', compact('commandes', 'users'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $cd = CommandeClient::find($request->commandeclient_id);
        $cd->update([
            'statut_id' => '4'
        ]);

        $me = User::where('id', $cd->user_id)->first();

        // notification::create([
        //     'subject' => 'Commande livrée',
        //     'message' => 'Votre commande est marquée comme livrée, Merci de la Confiance',
        //     'user_id' =>$cd->user_id,
        // ]);
        $me->notify(new CommandeDone($me));

        return back()->with('success', 'La commande a été livrée');
    }
}