<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Devis;
use App\Models\Devise;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Partenaire;
use App\Models\DevisClient;
use Illuminate\Http\Request;
use App\Models\PartenaireLogo;
use App\Notifications\DevisPrice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PartenaireController extends Controller
{
    //

    public function indexAll()
    {
        $partenaires = Partenaire::all();
        return view('admin.pages.partenaires', compact('partenaires'));
    }
    public function devis()
    {
        $users = User::whereHas('devisclient')->orderBy('id', 'desc')->get();
        $userMonths = User::whereHas(
            'commandes',
            function ($query) {
                $query->where('state', '1');
            }
        )->orderBy('id', 'desc')->get();
        $devis = DevisClient::where('state', 1)->orderBy('created_at', 'desc')->get();
        $devises = Devise::select('id', 'symbole')->get();
        // $demandes = Commande::where('state', '1')->orderby('id', 'desc')->paginate(20);
        // $article = Produit::where('id', '0')->first();
        // $categories = Categorie::where('statut_id', '1')->get();
        // $devis = Commande::where('state', '1')->orderby('id', 'asc')->paginate(20);
        return view('admin.pages.devis', compact('userMonths', 'devis', 'devises', 'users'));
    }
    // public function jourdevis()
    // {
    //     $produits = Produit::orderBy('id', 'desc')->get();
    //     // $users = User::orderBy('id', 'desc')->get();
    //     // $users = User::withCount('commandes')->orderBy('commandes_count', 'desc')->get();
    //     $userMonths = User::whereHas('commandes')->orderBy('created_at', 'desc')->get();
    //     $users = User::with('commandes')->whereHas('commandes', function ($query) {
    //         $query->where('state', '1')->whereDay('created_at', now())->orderBy('created_at', 'desc');
    //     })->get();

    //     $demandes = Commande::where('state', '1')->orderBy('created_at', 'desc')->paginate(20);
    //     $article = Produit::where('id', '0')->first();
    //     $categories = Categorie::where('statut_id', '1')->get();
    //     $devis = Commande::where('state', '1')->orderby('id', 'asc')->paginate(20);
    //     return view('admin.pages.devis', compact('produits', 'categories', 'userMonths', 'demandes', 'article', 'devis', 'users'));
    // }
    // public function moisdevis()
    // {
    //     $produits = Produit::orderBy('id', 'desc')->get();
    //     // $users = User::orderBy('id', 'desc')->get();
    //     // $users = User::withCount('commandes')->orderBy('commandes_count', 'desc')->get();
    //     $userMonths = User::whereHas('commandes')->orderBy('created_at', 'desc')->get();
    //     $users = User::whereHas(
    //         'commandes',
    //         function ($query) {
    //             $query->where('state', '1')->whereMonth('updated_at', now())->orderBy('created_at', 'desc');
    //             ;
    //         }
    //     )->orderby('nom', 'asc')->get();


    //     $demandes = Commande::where('state', '1')->orderBy('created_at', 'desc')->paginate(20);
    //     $article = Produit::where('id', '0')->first();
    //     $categories = Categorie::where('statut_id', '1')->get();
    //     $devis = Commande::where('state', '1')->orderby('id', 'asc')->paginate(20);
    //     return view('admin.pages.devis', compact('produits', 'categories', 'userMonths', 'demandes', 'article', 'devis', 'users'));
    // }
    // public function annedevis()
    // {
    //     $produits = Produit::orderBy('id', 'desc')->get();
    //     // $users = User::orderBy('id', 'desc')->get();
    //     // $users = User::withCount('commandes')->orderBy('commandes_count', 'desc')->get();
    //     $userMonths = User::whereHas('commandes')->orderBy('created_at', 'desc')->get();
    //     $users = User::whereHas(
    //         'commandes',
    //         function ($query) {
    //             $query->where('state', '1')->whereYear('created_at', now())->orderBy('created_at', 'desc');
    //         }
    //     )->orderBy('created_at', 'desc')->get();

    //     $demandes = Commande::where('state', '1')->orderBy('created_at', 'desc')->paginate(20);
    //     $article = Produit::where('id', '0')->first();
    //     $categories = Categorie::where('statut_id', '1')->get();
    //     $devis = Commande::where('state', '1')->orderby('id', 'asc')->paginate(20);
    //     return view('admin.pages.devis', compact('produits', 'categories', 'userMonths', 'demandes', 'article', 'devis', 'users'));
    // }
    public function devisLink($id)
    {
        $deletes = Commande::where('user_id', $id)->get();
        foreach ($deletes as $delete) {
            $take = Commande::where('id', $delete->id)->first()->update([
                'notification' => '0'
            ]);
        }
        $produits = Produit::orderBy('id', 'desc')->get();
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::withCount('commandes')->orderBy('commandes_count', 'desc')->get();
        $users = User::whereHas('commandes')->orderBy('id', 'desc')->get();
        $userMonths = User::whereHas(
            'commandes',
            function ($query) {
                $query->where('state', '1');
            }
        )->orderBy('id', 'desc')->get();

        $demandes = Commande::where('state', '1')->orderby('id', 'desc')->paginate(20);
        $article = Produit::where('id', '0')->first();
        $categories = Categorie::where('statut_id', '1')->get();
        $devis = Commande::where('state', '1')->orderby('id', 'asc')->paginate(20);
        return view('admin.pages.devis', compact('produits', 'categories', 'userMonths', 'demandes', 'article', 'devis', 'users'));
    }
    public function edit(Request $request)
    {

        $devis = Commande::where('id', $request->ids)->first();

        if ($devis) {
            # code...
            $devis->update([
                'state' => 0,
                'prix' => $request->prix
            ]);
            Chat::create([
                'message' => 'Votre demande de devis pour le produit ' . $devis->produit->nom . 'a bien été reçue et elle vaut ' . $request->prix,
                'client_id' => $devis->user->id,
                'statut_id' => '1',
                'admin_id' => Auth::user()->id
            ]);
        }
        return back()->with('success', 'demande effectuée avec success');
    }
    public function update(Request $request)
    {
        foreach ($request->price as $key => $commande) {
            $store = Commande::where('id', $request->id[$key])->first();
            if ($request->price[$key] != null) {
                # code...
                $store->update([
                    'state' => '0',
                    'statut_id' => '4',
                    'prix' => $request->price[$key],
                    'devise_id' => $request->devise_id[$key]
                ]);

                DevisClient::find($store->devis_client_id)->update([
                    'state' => 1
                ]);
            }
        }
        $user = User::where('id', $request->user_id)->first();
        // notification::create([
        //     'message' => "Vous avez reçu les prix du devis demandés",
        //     'subject' => "Réception des prix",
        //     'user_id' => $request->user_id
        // ]);
        $user->notify(new DevisPrice($user));

        return redirect()->back()->with('success', 'Devis traité avec succès');
    }

    public function store(Request $request)
    {
        if ($request->has('image')) {
            Partenaire::create([
                'nom' => $request->nom,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'description' => $request->description,
                'quartier' => $request->quartier,
                'commune' => $request->commune,
                'ville' => $request->ville,
                'province' => $request->province,
                'pays' => $request->pays,
                'user_id' => Auth::user()->id,
                'contact_id' => Auth::user()->id,
                'statut_id' => $request->statut_id,
                'image' => $request->file('image')->getClientOriginalName(),
            ]);
            $request->file('image')->move(public_path('/assets/images/partenaires/'), $request->file('image')->getClientOriginalName());

            return back()->with('success', 'Ajout effectué avec success');
        } else {
            $categorie = Partenaire::create([
                'nom' => $request->nom,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'description' => $request->description,
                'quartier' => $request->quartier,
                'commune' => $request->commune,
                'ville' => $request->ville,
                'province' => $request->province,
                'pays' => $request->pays,
                'user_id' => Auth::user()->id,
                'contact_id' => Auth::user()->id,
                'statut_id' => $request->statut_id,
            ]);
            return back()->with('success', 'Ajout effectué avec success');
        }
    }

    public function storelogo(Request $request)
    {
        if ($request->has('image')) {
            PartenaireLogo::create([
                'logo' => $request->file('image')->getClientOriginalName(),
                'name' => $request->name,
                'statut_id' => $request->statut_id
            ]);
            $request->file('image')->move(public_path('/assets/images/partenaires/logos/'), $request->file('image')->getClientOriginalName());
        }
        return back();
    }

    public function updatelogo(Request $request)
    {
        $doc = PartenaireLogo::find($request->pl_id);
        if ($request->has('image')) {
            if (File::exists(public_path('/assets/images/partenaires/logos/' . $doc->image))) {
                File::delete(public_path('/assets/images/partenaires/logos/' . $doc->image));
            }
            $doc->update([
                'logo' => $request->file('image')->getClientOriginalName(),
                'name' => $request->name,
                'statut_id' => $request->statut_id

            ]);
            $request->file('image')->move(public_path('/assets/images/partenaires/logos/'), $request->file('image')->getClientOriginalName());
        } else {
            $doc->update([
                'name' => $request->name,
                'statut_id' => $request->statut_id
            ]);
        }

        return back();
    }

    public function deletelogo($id)
    {

        $doc = PartenaireLogo::find($id);
        if (File::exists(public_path('/assets/images/partenaires/logos/' . $doc->logo))) {
            # code...
            File::delete(public_path('/assets/images/partenaires/logos/' . $doc->logo));
        }
        $doc->delete();
        return back();
    }

    public function delete($id)
    {
        $delete = Partenaire::where('id', $id)->first()->delete();
        return redirect()->back()->with('success', 'Suppression effectué avec success');
    }
    public function destroy($id)
    {
        $delete = Devis::where('id', $id)->first()->delete();
        return redirect()->back()->with('success', 'Suppression effectué avec success');
    }
}