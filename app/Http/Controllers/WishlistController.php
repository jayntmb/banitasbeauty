<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function getUserWishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->with('produit')->get();

        return view('favoris.favoris', compact('wishlists'));
    }

    public function add(Request $request)
    {
        try {
            $wish = Wishlist::where('produit_id', $request->productId)
                ->where('user_id', Auth::user()->id)
                ->first();

            if ($wish) {
                return response()->json(['exists' => 'Le produit existe déjà dans votre liste des souhaits !']);
            }

            $wishlist = Wishlist::create([
                'produit_id' => $request->productId,
                'user_id' => Auth::user()->id
            ]);

            $wishcount = Wishlist::where('user_id', Auth::user()->id)->count();

            return response()->json([
                'success' => 'Le produit a été ajouté à votre liste des souhaits avec succès !',
                'count' => $wishcount,
                'wishlist' => $wishlist
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Une erreur s\'est produite lors de l\'ajout du produit à votre liste des souhaits.']);
        }
    }

    public function remove($id, Request $request)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        if ($request->reload) {
            return back()->with('success', 'Le produit a été retiré de votre liste des souhaits avec succès !');
        }

        return response()->json(['message' => 'Le produit a été retiré de votre liste des souhaits avec succès !']);
    }
}