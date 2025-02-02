<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-image fa-3x text-green"></i>
                <h5 class="card-title">Bannière</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Modifier le titre, la description, l'image, le lien et le texte du bouton
                    de la bannière.
                </p>
            </div>
        </div>
    </a>

    <!-- Modale -->
    @if ($showModal)
        <!-- Fond sombre -->
        <div class="modal-backdrop fade show"></div>

        <!-- Modale -->
        <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- En-tête de la modale -->
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title" id="bannerModalLabel">Modifier la bannière</h5>
                        <button type="button" class="btn-close btn-white btn-close-white" wire:click="closeModal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Corps de la modale -->
                    <div class="modal-body">
                        <form wire:submit.prevent="updateBanner" enctype="multipart/form-data">
                            <!-- Titre (Ligne 1) -->
                            <div class="form-group my-2">
                                <label for="titleLine1">Titre (Ligne 1)</label>
                                <input type="text" id="titleLine1" wire:model="titleLine1" class="form-control">
                                @error('titleLine1')
                                    <span class="text-danger fs-6 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Titre (Ligne 2) -->
                            <div class="form-group my-2">
                                <label for="titleLine2">Titre (Ligne 2)</label>
                                <input type="text" id="titleLine2" wire:model="titleLine2" class="form-control">
                                @error('titleLine2')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group my-2">
                                <label for="description">Description</label>
                                <textarea id="description" wire:model="description" class="form-control" rows="4"></textarea>
                                @error('description')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Texte du bouton -->
                            <div class="form-group my-2">
                                <label for="buttonText">Texte du bouton</label>
                                <input type="text" id="buttonText" wire:model="buttonText" class="form-control">
                                @error('buttonText')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="newImage" class="form-label">Image</label>
                                <div class="input-group">
                                    <input type="file" id="newImage" wire:model="newImage" class="form-control">
                                    @error('newImage')
                                        <span class="text-danger fs-6">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newImage">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>
                                <!-- Aperçu de l'image actuelle ou nouvelle -->
                                @if ($newImage && !in_array($newImage->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newImage && in_array($newImage->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="Nouvelle image"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('storage/' . $image) }}" alt="Image actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                    <span wire:loading.remove>
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
