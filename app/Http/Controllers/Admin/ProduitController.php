<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::orderBy('id', 'desc')->paginate(20);
        $article = Produit::where('id', '0')->first();
        $categories = Categorie::where('statut_id', '1')->get();
        $devis = Commande::where('statut_id', '1')->orderby('id', 'desc')->paginate(20);

        return view('admin.pages.produits', compact('produits', 'categories', 'article', 'devis'));
    }

    public function search(Request $request)
    {
        $produits = Produit::where('nom', 'LIKE', '%' . $request->get('value') . '%')
            ->latest()
            ->get();
        $categories = Categorie::where('statut_id', '1')->get();

        $html = view('admin.partials.product-search-results', compact('produits', 'categories'))->render();

        // Return the view with the generated HTML
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'nom' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'prix' => 'required|numeric',
                    'categorie_id' => 'required|integer|exists:categories,id',
                    'statut_id' => 'required|integer',
                    'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
                    'images' => 'nullable|array|max:3',
                    'images.*' => 'file|mimes:jpeg,png,jpg|max:4096',
                ],
                [
                    'nom.required' => 'Le nom du produit est obligatoire',
                    'nom.string' => 'Le nom du produit doit être une chaîne de caractères',
                    'nom.max' => 'Le nom du produit ne doit pas dépasser 255 caractères',
                    'description.string' => 'La description du produit doit être une chaîne de caractères',
                    'prix.required' => 'Le prix du produit est obligatoire',
                    'prix.numeric' => 'Le prix du produit doit être un nombre',
                    'categorie_id.required' => 'La catégorie du produit est obligatoire',
                    'categorie_id.integer' => 'La catégorie du produit doit être un entier',
                    'categorie_id.exists' => 'La catégorie du produit n\'existe pas',
                    'statut_id.required' => 'Le statut du produit est obligatoire',
                    'statut_id.integer' => 'Le statut du produit doit être un entier',
                    'video.file' => 'La vidéo du produit doit être un fichier',
                    'video.mimes' => 'La vidéo du produit doit être un fichier de type mp4, mov ou avi',
                    'video.max' => 'La vidéo du produit ne doit pas dépasser 10 Mo',
                    'images.array' => 'Les images du produit doivent être un tableau',
                    'images.*.file' => 'Les images du produit doivent être des fichiers',
                    'images.*.mimes' => 'Les images du produit doivent être des fichiers de type jpeg, png ou jpg',
                    'images.*.max' => 'Les images du produit ne doivent pas dépasser 4 Mo',
                ]
            );

            $is_promo = $request->is_promo ? 1 : 0;
            $is_arrivage = $request->is_arrivage ? 1 : 0;

            $produitData = [
                'nom' => $validatedData['nom'],
                'prix' => $validatedData['prix'],
                'description' => $validatedData['description'] ?? null,
                'categorie_id' => $validatedData['categorie_id'],
                'statut_id' => $validatedData['statut_id'],
                'is_promo' => $is_promo,
                'is_arrivage' => $is_arrivage,
                'promo_type' => $request->promo_type ?? null,
                'promo_value' => $request->promo_value ?? 0,
                'promo_start_date' => $request->promo_start_date ?? null,
                'promo_end_date' => $request->promo_end_date ?? null,
            ];

            $produit = Produit::create($produitData);

            // Handle file uploads
            $this->handleFileUpload($request, $produit);

            return redirect()->route('admin.produits')->with('success', 'Le produit a été ajouté avec succès !');
        } catch (ValidationException $e) {
            // Log validation errors
            Log::error('Erreur de validation : ' . $e->getMessage());

            // Pass the validation errors to the view
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de l\'ajout du produit : ' . $e->getMessage());

            // Redirection avec message d'erreur
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    private function handleFileUpload(Request $request, Produit $produit)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $index => $image) {
                $imageName = $image->getClientOriginalName();
                // Move the image to the public folder
                $image->move(public_path('/assets/images/produits/'), $imageName);

                // Determine the image column based on the index (0 for first_image, 1 for second_image, 2 for third_image)
                switch ($index) {
                    case 0:
                        $produit->update(['first_image' => $imageName]);
                        break;
                    case 1:
                        $produit->update(['second_image' => $imageName]);
                        break;
                    case 2:
                        $produit->update(['third_image' => $imageName]);
                        break;
                }
            }
        }

        if ($request->hasFile('video')) {
            $videoName = $request->file('video')->getClientOriginalName();
            $produit->update(['video' => $videoName]);
            $request->file('video')->move(public_path('/assets/images/produits/video/'), $videoName);
        }
    }

    private function handleFileUpdate(Request $request, Produit $produit)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $index => $image) {
                $imageName = $image->getClientOriginalName();

                // Supprimer l'ancienne image si elle existe
                switch ($index) {
                    case 0:
                        if ($produit->first_image && file_exists(public_path('/assets/images/produits/' . $produit->first_image))) {
                            unlink(public_path('/assets/images/produits/' . $produit->first_image));
                        }
                        $produit->update(['first_image' => $imageName]);
                        break;
                    case 1:
                        if ($produit->second_image && file_exists(public_path('/assets/images/produits/' . $produit->second_image))) {
                            unlink(public_path('/assets/images/produits/' . $produit->second_image));
                        }
                        $produit->update(['second_image' => $imageName]);
                        break;
                    case 2:
                        if ($produit->third_image && file_exists(public_path('/assets/images/produits/' . $produit->third_image))) {
                            unlink(public_path('/assets/images/produits/' . $produit->third_image));
                        }
                        $produit->update(['third_image' => $imageName]);
                        break;
                }

                // Déplacer le nouveau fichier
                $image->move(public_path('/assets/images/produits/'), $imageName);
            }
        }
    }

    public function edit($id)
    {
        $produits = Produit::orderBy('id', 'desc')->get();
        $article = Produit::where('id', $id)->first();
        $categories = Categorie::where('statut_id', '1')->get();

        return view('admin.pages.produits.index', compact('produits', 'categories', 'article'));
    }

    public function update(Request $request, Produit $produit)
    {
        try {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'prix' => 'required|numeric',
                'categorie_id' => 'required|integer|exists:categories,id',
                'statut_id' => 'required|integer',
                'images' => 'nullable|array|max:3',
                'images.*' => 'file|mimes:jpeg,png,jpg|max:4096',
            ], [
                'nom.required' => 'Le nom du produit est obligatoire',
                'nom.string' => 'Le nom du produit doit être une chaîne de caractères',
                'nom.max' => 'Le nom du produit ne doit pas dépasser 255 caractères',
                'description.string' => 'La description du produit doit être une chaîne de caractères',
                'prix.required' => 'Le prix du produit est obligatoire',
                'prix.numeric' => 'Le prix du produit doit être un nombre',
                'categorie_id.required' => 'La catégorie du produit est obligatoire',
                'categorie_id.integer' => 'La catégorie du produit doit être un entier',
                'categorie_id.exists' => 'La catégorie du produit n\'existe pas',
                'statut_id.required' => 'Le statut du produit est obligatoire',
                'statut_id.integer' => 'Le statut du produit doit être un entier',
                'images.array' => 'Les images du produit doivent être un tableau',
                'images.*.file' => 'Les images du produit doivent être des fichiers',
                'images.*.mimes' => 'Les images du produit doivent être des fichiers de type jpeg, png ou jpg',
                'images.*.max' => 'Les images du produit ne doivent pas dépasser 4 Mo',
            ]);

            $produitData = [
                'nom' => $validatedData['nom'],
                'prix' => $validatedData['prix'],
                'description' => $validatedData['description'] ?? $produit->description,
                'categorie_id' => $validatedData['categorie_id'],
                'statut_id' => $validatedData['statut_id'],
            ];

            $produit->update($produitData);

            // Gestion des fichiers
            $this->handleFileUpdate($request, $produit);

            return redirect()->route('admin.produits')->with('success', 'Le produit a été mis à jour avec succès !');
        } catch (ValidationException $e) {
            // Log validation errors
            Log::error('Erreur de validation : ' . $e->getMessage());

            // Pass the validation errors to the view
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour du produit : ' . $e->getMessage());

            // Redirection avec message d'erreur
            return back()->withErrors($e->getMessage())->withInput();
        }
    }


    public function destroy($id)
    {
        Produit::find($id)->delete();

        return redirect()->route('admin.produits')->with('success', 'la suppression effectuée avec success');
    }
}