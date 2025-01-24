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
use App\Http\Controllers\WishlistController;
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
use App\Models\Wishlist;

Route::middleware('userOnline')->group(function () {
    // Home and Static Pages
    Route::get('/', [AccueilController::class, 'index'])->name('home');
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

        // Orders
        Route::get('/mes-commandes/{tab?}', [CommandeController::class, 'index'])->name('commandes.index');
        Route::get('/commande/delete/{id}', [CommandeController::class, 'destroy'])->name('commande.delete');
        Route::get('/commande/store', [CommandeController::class, 'passercommande'])->name('commandes.store');
        Route::get('/commande/client/delete/{id}', [CommandeController::class, 'deletecommande'])->name('commandes.client.delete');
        Route::get('/commande/devis/delete/{id}', [CommandeController::class, 'deletedevis'])->name('commandes.devis.delete');
        Route::get('/passer-commande/{id}', [CommandeController::class, 'passagecommande'])->name('commandes.passer');
        Route::get('/commandes/client/{tab?}', [CommandeController::class, 'clientcommandes'])->name('commandes.client');
        Route::get('/commande/valider', [CommandeController::class, 'valider'])->name('panier.valide');

        // Cart Management
        Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
        Route::get('/panier/ajouter/{id}/{quantite}', [PanierController::class, 'store'])->name('panier.store');
        Route::get('/panier/supprimer/{id}/{quantite}', [PanierController::class, 'diminue'])->name('panier.diminue');
        Route::get('/panier/supprimer/{id}', [PanierController::class, 'destroy'])->name('panier.delete');
        Route::post('/panier/update-quantity', [PanierController::class, 'updateQuantity'])->name('panier.updateQuantity');

        // Favorites
        Route::get('/favoris', [WishlistController::class, 'getUserWishlist'])->name('favorites');
        Route::post('/favoris/add', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::delete('/favoris/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    });

    // Identification
    Route::get('/identification', [\App\Http\Controllers\pedro\indetificationController::class, 'index'])->name('identification');

    // New Product
    Route::get('/new-produit', function () {
        return view('admin.pages.new-produit');
    })->name('new-produit');

    // API Routes
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
});

// Include additional routes
require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';
