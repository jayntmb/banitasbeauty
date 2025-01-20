<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartenaireController;
use App\Http\Controllers\Admin\CommandeClientController;

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('tableau-de-bord', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('site/update', [DashboardController::class, 'updatesiteinfo'])->name('site.update');

        Route::get('tableau-de-bord/produits', [ProduitController::class, 'index'])->name('admin.produits');
        Route::post('tableau-de-bord/produits/ajouter', [ProduitController::class, 'store'])->name('admin.produits.store');
        Route::post('tableau-de-bord/produits/editer', [ProduitController::class, 'edit'])->name('admin.produits.edit');
        Route::get('tableau-de-bord/produits/supprimer/{id}', [ProduitController::class, 'destroy'])->name('admin.produits.delete');
        Route::post('tableau-de-bord/produits/mettre-a-jour/{produit}', [ProduitController::class, 'update'])->name('admin.produits.update');

        Route::get('tableau-de-bord/categories', [CategorieController::class, 'index'])->name('admin.categories');
        Route::post('tableau-de-bord/categories/ajouter', [CategorieController::class, 'store'])->name('admin.categories.store');
        Route::get('tableau-de-bord/categories/editer/{id}', [CategorieController::class, 'edit'])->name('admin.categories.edit');
        Route::get('tableau-de-bord/categories/supprimer/{id}', [CategorieController::class, 'destroy'])->name('admin.categories.delete');
        Route::post('tableau-de-bord/categories/sauvegarder', [CategorieController::class, 'update'])->name('admin.categories.update');

        Route::get('tableau-de-bord/newslletters/supprimer/{id}', [ChatController::class, 'Deleteletters'])->name('admin.news.delete');
        Route::get('tableau-de-bord/newslletters', [ChatController::class, 'letters'])->name('admin.mail');

        Route::get('tableau-de-bord/chats', [ChatController::class, 'index'])->name('admin.chats.index');
        Route::get('tableau-de-bord/chats/{id}', [ChatController::class, 'show'])->name('admin.chats.show');
        Route::post('tableau-de-bord/chats/envoyer', [ChatController::class, 'store'])->name('admin.chats.store');

        Route::get('tableau-de-bord/clients', [ClientController::class, 'index'])->name('admin.clients');
        Route::get('tableau-de-bord/clients/activation/{id}', [ClientController::class, 'clientactivation'])->name('admin.clients.activation');
        Route::post('tableau-de-bord/clients/ajouter', [ClientController::class, 'store'])->name('admin.clients.store');
        Route::get('tableau-de-bord/clients/editer/{id}', [ClientController::class, 'edit'])->name('admin.clients.edit');
        Route::get('tableau-de-bord/clients/supprimer/{id}', [ClientController::class, 'destroy'])->name('admin.clients.delete');
        Route::post('tableau-de-bord/clients/sauvegarder', [ClientController::class, 'update'])->name('admin.clients.update');

        Route::get('tableau-de-bord/partenaires', [PartenaireController::class, 'indexAll'])->name('admin.partenaires');
        Route::post('tableau-de-bord/partenaires/ajouter', [PartenaireController::class, 'store'])->name('admin.partenaires.store');
        Route::get('tableau-de-bord/partenaires/editer/{id}', [PartenaireController::class, 'edit'])->name('admin.partenaires.edit');
        Route::get('tableau-de-bord/partenaires/supprimer/{id}', [PartenaireController::class, 'delete'])->name('admin.partenaires.delete');
        Route::post('tableau-de-bord/partenaires/sauvegarder', [PartenaireController::class, 'update'])->name('admin.partenaires.update');
        Route::post('tableau-de-bord/partenaires/logo/ajouter', [PartenaireController::class, 'storelogo'])->name('admin.partenaires.logo.store');
        Route::post('tableau-de-bord/partenaires/logo/editer', [PartenaireController::class, 'updatelogo'])->name('admin.partenaires.logo.update');
        Route::get('tableau-de-bord/partenaires/supprimer/{id}', [PartenaireController::class, 'deletelogo'])->name('admin.partenaires.logo.delete');

        // Route::get('tableau-de-bord/devis/jour', [PartenaireController::class, 'jourdevis'])->name('admin.devis.jour');
        // Route::get('tableau-de-bord/devis/mois', [PartenaireController::class, 'moisdevis'])->name('admin.devis.mois');
        // Route::get('tableau-de-bord/devis/annee', [PartenaireController::class, 'annedevis'])->name('admin.devis.annee');
        Route::get('tableau-de-bord/devis', [PartenaireController::class, 'devis'])->name('admin.devis');
        Route::get('tableau-de-bord/devis/link/{id}', [PartenaireController::class, 'devisLink'])->name('admin.devisLink');
        Route::post('tableau-de-bord/devis/ajouter', [PartenaireController::class, 'store'])->name('admin.devis.store');
        // Route::post('tableau-de-bord/devis/mis_a_jour', [PartenaireController::class, 'update'])->name('admin.devis.update');
        Route::get('tableau-de-bord/devis/editer', [PartenaireController::class, 'edit'])->name('admin.devis.edit');
        Route::get('tableau-de-bord/devis/supprimer/{id}', [PartenaireController::class, 'destroy'])->name('admin.devis.delete');
        Route::post('tableau-de-bord/devis/sauvegarder', [PartenaireController::class, 'update'])->name('admin.devis.update');

        Route::get('tableau-de-bord/client/commandes', [CommandeClientController::class, 'index'])->name('admin.commande.client');
        Route::post('tableau-de-bord/client/commandes/livrer', [CommandeClientController::class, 'update'])->name('admin.commandeclient.update');
        Route::get(
            'tableau-de-bord/certifications',
            function () {
                return view('admin.pages.certifications');
            }
        )->name('admin.certifications');

        Route::get(
            'tableau-de-bord/commandes',
            function () {
                return view('admin.pages.commandes');
            }
        )->name('admin.commandes');

        Route::get(
            'tableau-de-bord/messages',
            function () {
                return view('admin.pages.messages');
            }
        )->name('admin.messages');

        Route::get(
            'tableau-de-bord/newsletters',
            function () {
                return view('admin.pages.newsletters');
            }
        )->name('admin.newsletters');

        Route::get(
            'tableau-de-bord/paniers',
            function () {
                return view('admin.pages.paniers');
            }
        )->name('admin.paniers');

        Route::get(
            'tableau-de-bord/societes',
            function () {
                return view('admin.pages.societes');
            }
        )->name('admin.societes');

        Route::get(
            'tableau-de-bord/tags',
            function () {
                return view('admin.pages.tags');
            }
        )->name('admin.tags');
        Route::controller(ImageController::class)->group(
            function () {
                Route::get('gestion-image', 'index')->name('admin.gestion.images');
                Route::post('gestion-image/store', 'store')->name('admin.images.store');
            }
        );
    });
});