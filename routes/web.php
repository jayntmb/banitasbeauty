<?php

use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\PartenaireController;
use App\Http\Controllers\Admin\CommandeClientController;
use App\Http\Controllers\Admin\ChatController as AdminChatController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\ProduitController as AdminProduitController;

Route::get('/boutique', [ProduitController::class, 'index'])->name('boutique');

Route::get('/astuceBeaute', function () {
    return view('astuceBeaute.astuceBeaute');
});

Route::get('/entreprise', function () {
    $promoProduits = Produit::where('is_promo', true)->get();

    return view('entreprise.entreprise', compact('promoProduits'));
});

Route::get('/contact', function () {
    return view('contact.contact');
});


Route::get('/favoris', function () {
    return view('favoris.favoris');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [AccueilController::class, 'index'])->name('home');
Route::get('/inactive', [DashBoardController::class, 'inactive'])->name('inactive');

Route::post('/newsletters', [NewsletterController::class, 'store'])->name('newsletters');

Route::get('/a-propos', [AboutController::class, 'index'])->name('about');

Route::get('/produits', [ProduitController::class, 'index'])->name('produits');
Route::get('/produits/categorie/{materiel}/{id}', [ProduitController::class, 'categorie'])->name('produits.categorie');
Route::get('/produits/recherche', [ProduitController::class, 'recherche'])->name('produits.recherche');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts/message', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/engagements', [EngagementController::class, 'index'])->name('engagements');

Route::post('/demande/devis', [DevisController::class, 'store'])->name('devis.store');

Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');

Route::get('/tags', [TagController::class, 'index']);
Route::get('/identification', [\App\Http\Controllers\pedro\indetificationController::class, 'index'])->name('identification');

Route::get('/api/panier', function () {
    if (auth()->check()) {
        $cartItems = auth()->user()->panier()->with('produit')->get(); // Charge les produits associés
        $cartCount = $cartItems->count();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->produit->prix * $item->quantite;
        });

        return response()->json([
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
    Route::post('/mot-de-passe/modifier', [ClientController::class, 'password'])->name('password.change');

    Route::post('/mon-profil/modifier', [ClientController::class, 'update'])->name('profil.update');
    Route::get('/mon-profil', [ClientController::class, 'profil'])->name('profils.edit');

    Route::get('/messages', [ChatController::class, 'index'])->name('notifications.index');
    Route::post('/messages/envoyer', [ChatController::class, 'store'])->name('notifications.store');

    Route::get('/mes-commandes/{tab?}', [CommandeController::class, 'index'])->name('commandes.index');
    Route::get('/commande/delete/{id}', [CommandeController::class, 'destroy'])->name('commande.delete');
    Route::get('/commande/store', [CommandeController::class, 'passercommande'])->name('commandes.store');
    Route::get('/commande/client/delete/{id}', [CommandeController::class, 'deletecommande'])->name('commandes.client.delete');
    Route::get('/commande/devis/delete/{id}', [CommandeController::class, 'deletedevis'])->name('commandes.devis.delete');
    Route::get('/passer-commande/{id}', [CommandeController::class, 'passagecommande'])->name('commandes.passer');
    Route::get('/commandes/client/{tab?}', [CommandeController::class, 'clientcommandes'])->name('commandes.client');
    Route::get('/commande/valider', [CommandeController::class, 'valider'])->name('panier.valide');

    Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
    Route::get('/panier/ajouter/{id}/{quantite}', [PanierController::class, 'store'])->name('panier.store');
    Route::get('/panier/supprimer/{id}/{quantite}', [PanierController::class, 'diminue'])->name('panier.diminue');
    Route::get('/panier/supprimer/{id}', [PanierController::class, 'destroy'])->name('panier.delete');
    Route::post('/panier/update-quantity', [PanierController::class, 'updateQuantity'])->name('panier.updateQuantity');

});

Route::get('/new-produit', function () {
    return view('admin.pages.new-produit');
})->name('new-produit');



require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';