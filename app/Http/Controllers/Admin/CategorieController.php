<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::orderBy('libelle', 'asc')->get();
        $article = Categorie::where('id', '0')->first();


        return view('admin.pages.categories', compact('categories', 'article'));
    }

    public function store(Request $request)
    {
        $categorie = Categorie::create([
            'libelle' => $request->nom,
            'statut_id' => $request->statut_id,
            'image' => "",
        ]);

        if ($request->has('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/assets/images/categories/'), $fileName);
            $categorie->update([
                'image' => $fileName,
            ]);
        }

        return back()->with('success', 'L\'ajout de la catégorie a été effectué avec success !');
    }


    public function edit($id)
    {
        $categories = Categorie::orderBy('libelle', 'asc')->get();
        $article = Categorie::where('id', $id)->first();

        return view('admin.pages.categories', compact('categories', 'article'));
    }

    public function update(Request $request)
    {
        $file = null;
        $ext = '';
        $categorie = Categorie::find($request->categorie_id);

        $categorie->update([
            'libelle' => $request->libelle,
            'id_updated_at' => Auth::user()->id,
            'statut_id' => $request->statut_id,
        ]);

        if ($request->file('image') != null) {
            $fileName = $request->file('image')->getClientOriginalName();
            if (File::exists(public_path('assets/images/categories/' . $categorie->image))) {
                File::delete(public_path('assets/images/categories/' . $categorie->image));
            }
            $request->file('image')->move(public_path('assets/images/categories/'), $fileName);

            $categorie->update([
                'image' => $fileName,
            ]);
        }

        return back()->with('success', 'La catégorie a été modifiée avec success !');
    }

    public function destroy($id)
    {
        Categorie::find( $id)->delete();
        return back()->with('success', 'Suppression effectuée avec success');
    }
}