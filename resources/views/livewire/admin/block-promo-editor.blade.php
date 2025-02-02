<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-edit fa-3x mb-3 text-primary"></i>
                <h5 class="card-title">Bloc de Promotion</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Modifier le contenu du bloc promo.
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
                        <h5 class="modal-title">Modifier le bloc Promo</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateBlockPromo">
                            <!-- product_name -->
                            <div class="form-group my-2">
                                <label for="searchProduct">Nom du produit</label>
                                <input type="text" id="searchProduct" wire:model.live="searchTerm"
                                    class="form-control" placeholder="Rechercher un produit...">

                                @if (!empty($searchResults))
                                    <ul class="list-group mt-2 z-3 bg-white rounded-md text-dark">
                                        @foreach ($searchResults as $product)
                                            <li class="list-group-item list-group-item-action text-dark"
                                                wire:click="selectProduct({{ $product->id }})">
                                                {{ $product->nom }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- description -->
                            <div class="form-group my-2">
                                <label for="description">Description</label>
                                <textarea id="description" wire:model="description" class="form-control"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="form-group my-2">
                                <label for="newImage">Image</label>
                                <div class="input-group">
                                    <input type="file" hidden id="newImage" wire:model="newImage" class="form-control">
                                    @error('newImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($newImage && !in_array($newImage->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newImage && in_array($newImage->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="Nouvelle image"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('assets/images/produits/' . $image) }}" alt="Image actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                    <span>
                                        <i class="fas fa-save me-2"></i> Enregistrer
                                    </span>
                                    <span wire:loading>
                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
