<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-image fa-3x mb-3 text-green"></i>
                <h5 class="card-title">Bannière</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Modifier le titre, la description, l'image, le lien et le texte du bouton de la bannière.
                </p>
            </div>
        </div>
    </a>

    <!-- Modale -->
    @if ($showModal)
        <!-- Fond sombre -->
        <div class="modal-backdrop fade show"></div>

        <!-- Modale -->
        <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- En-tête de la modale -->
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title" id="bannerModalLabel">Modifier la bannière</h5>
                        <button type="button" class="btn-close btn-white btn-close-white" wire:click="closeModal" aria-label="Close"></button>
                    </div>

                    <!-- Corps de la modale -->
                    <div class="modal-body">
                        <form wire:submit.prevent="updateBanner" enctype="multipart/form-data">
                            <!-- Titre (Ligne 1) -->
                            <div class="mb-3">
                                <label for="titleLine1" class="form-label">Titre (Ligne 1)</label>
                                <input type="text" id="titleLine1" wire:model="titleLine1" class="form-control">
                            </div>

                            <!-- Titre (Ligne 2) -->
                            <div class="mb-3">
                                <label for="titleLine2" class="form-label">Titre (Ligne 2)</label>
                                <input type="text" id="titleLine2" wire:model="titleLine2" class="form-control">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" wire:model="description" class="form-control" rows="4"></textarea>
                            </div>

                            <!-- Texte du bouton -->
                            <div class="mb-3">
                                <label for="buttonText" class="form-label">Texte du bouton</label>
                                <input type="text" id="buttonText" wire:model="buttonText" class="form-control">
                            </div>

                            <!-- Lien du bouton -->
                            <div class="mb-3">
                                <label for="buttonLink" class="form-label">Lien du bouton</label>
                                <input type="text" readonly id="buttonLink" wire:model="buttonLink" class="form-control">
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="newImage" class="form-label">Image</label>
                                <input type="file" id="newImage" wire:model="newImage" class="form-control">
                                <div wire:loading wire:target="newImage">Uploading...</div>
                                <!-- Aperçu de l'image actuelle ou nouvelle -->
                                @if ($newImage)
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="Nouvelle image" class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('storage/' . $image) }}" alt="Image actuelle" class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
