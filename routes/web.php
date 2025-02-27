<?php

use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\NewsletterController;


Route::middleware('userOnline')->group(function () {
    // Home and Static Pages
    Route::get('/', [AccueilController::class, 'index'])->name('home');
    Route::get('/boutique', [ProduitController::class, 'index'])->name('boutique');
    Route::get('/astuceBeaute', function () {
        return view('astuceBeaute.astuceBeaute');
    })->name('astucebeaute');

    Route::get('/entreprise', function () {
        $promoProduits = Produit::where('is_promo', true)->get();
        return view('entreprise.entreprise', compact('promoProduits'));
    })->name('entreprise');
    
    Route::get('/contact', function () {
        return view('contact.contact');
    })->name('contact');
    
    Route::get('/a-propos', [AboutController::class, 'index'])->name('about');

    // Product Routes
    Route::get('/produits', [ProduitController::class, 'index'])->name('produits');
    Route::get('/produits/categorie/{materiel}/{id}', [ProduitController::class, 'categorie'])->name('produits.categorie');
    Route::get('/produits/recherche', [ProduitController::class, 'recherche'])->name('produits.recherche');
    Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');

    // Contact Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::post('/contacts/message', [ContactController::class, 'store'])->name('contacts.store');

    // Engagements
    Route::get('/engagements', [EngagementController::class, 'index'])->name('engagements');

    // Newsletter
    Route::post('/newsletters', [NewsletterController::class, 'store'])->name('newsletters');

    // Authentication Routes
    Route::middleware('auth')->group(function () {
        // Profile Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Dashboard
        Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');

        // Password Management
        Route::post('/mot-de-passe/modifier', [ClientController::class, 'password'])->name('password.change');

        // User Profile
        Route::post('/mon-profil/modifier', [ClientController::class, 'update'])->name('profil.update');
        Route::get('/mon-profil', [ClientController::class, 'profil'])->name('profils.edit');

        // Messages
        Route::get('/messages', [ChatController::class, 'index'])->name('notifications.index');
        Route::post('/messages/envoyer', [ChatController::class, 'store'])->name('notifications.store');

        // Favorites
        Route::get('/favoris', [WishlistController::class, 'getUserWishlist'])->name('favorites');
        Route::post('/favoris/add', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::delete('/favoris/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
        
        Route::get('/mes-commandes/{tab?}', [CommandeController::class, 'index'])->name('commandes.index');
    });
    // Orders
    Route::get('/commande/delete/{id}', [CommandeController::class, 'destroy'])->name('commande.delete');
    Route::get('/commande/store', [CommandeController::class, 'passercommande'])->name('commandes.store');
    Route::get('/commande/client/delete/{id}', [CommandeController::class, 'deletecommande'])->name('commandes.client.delete');
    Route::put('/commande/client/confirmation/{commande_id}', [CommandeController::class, 'confirmOrder'])->name('commande.client.confirm');
    Route::get('/passer-commande/{id}', [CommandeController::class, 'passagecommande'])->name('commandes.passer');
    Route::get('/commandes/client/{tab?}', [CommandeController::class, 'clientcommandes'])->name('commandes.client');
    Route::get('/commande/valider', [CommandeController::class, 'valider'])->name('panier.valide');

    // Cart Management
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
    Route::get('vider/panier', [PanierController::class, 'emptyCart'])->name('empty.cart');
    Route::post('/panier/supprimer/{produitId}', [PanierController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/panier/update-quantity/{produitId}', [PanierController::class, 'updateQuantity'])->name('panier.updateQuantity');
});

// Include additional routes
require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';
