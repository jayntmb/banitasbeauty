<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-edit fa-3x mb-3 text-primary"></i>
                <h5 class="card-title">Le produit phare</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Définir le produit à mettre en avant dans la page d'accueil.
                </p>
            </div>
        </div>
    </a>

    <!-- Modale -->
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
        <div class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Editer le produit phare</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="newProductSwitch" wire:model.live="isNewProduct">
                            <label class="form-check-label" for="newProductSwitch">C'est un nouveau produit</label>
                        </div>

                        @if ($isNewProduct)
                            <!-- Formulaire pour un nouveau produit -->
                            <form wire:submit.prevent="addNewProduct">
                                <div class="form-group my-2">
                                    <label for="newProductName">Nom du produit</label>
                                    <input type="text" id="newProductName" wire:model="newProductName" class="form-control"
                                        placeholder="Saisissez le nom du produit...">
                                    @error('newProductName') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="newProductPrice">Prix du produit</label>
                                    <input type="number" id="newProductPrice" wire:model="newProductPrice" class="form-control"
                                        placeholder="Saisissez le nom du produit...">
                                    @error('newProductPrice') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="newProductDescription">Description</label>
                                    <textarea id="newProductDescription" wire:model="newProductDescription"
                                        class="form-control"></textarea>
                                    @error('newProductDescription') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="newProductCategory">Catégorie</label>
                                    <select wire:model="newProductCategory" id="newProductCategory" class="form-control">
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('newProductCategory') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="newProductImages">Images</label>
                                    <input type="file" id="newProductImages" wire:model="newProductImages" class="form-control"
                                        multiple>
                                    @error('newProductImages') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                                </div>
                            </form>
                        @else
                            <!-- Formulaire pour un produit existant -->
                            <form wire:submit.prevent="selectExistingProduct">
                                <div class="form-group my-2">
                                    <label for="searchProduct">Rechercher un produit</label>
                                    <input type="text" id="searchProduct" wire:model.live="searchQuery" class="form-control"
                                        placeholder="Rechercher par nom...">
                                    @error('searchQuery') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                @if ($searchResults)
                                    <ul class="list-group">
                                        @foreach ($searchResults as $product)
                                            <li class="list-group-item" wire:click="selectProduct({{ $product->id }})">
                                                {{ $product->nom }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if ($selectedProduct)
                                    <div class="form-group my-2">
                                        <label for="selectedProductName">Nom du produit</label>
                                        <input type="text" id="selectedProductName" wire:model.live="selectedProduct.nom"
                                            class="form-control">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="selectedProductPrice">Prix du produit</label>
                                        <input type="text" id="selectedProductPrice" wire:model.live="selectedProduct.prix" class="form-control">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="selectedProductDescription">Description</label>
                                        <textarea id="selectedProductDescription" wire:model.live="selectedProduct.description"
                                            class="form-control"></textarea>
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="selectedProductImage">Image</label>
                                        <img src="{{ asset('storage/images/produits/' . $selectedProduct['first_image']) }}"
                                            alt="Image du produit" class="img-fluid">
                                    </div>
                                @endif

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Sélectionner le produit</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
