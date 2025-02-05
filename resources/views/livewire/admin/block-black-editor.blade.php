<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-edit fa-3x text-green"></i>
                <h5 class="card-title">Block Black</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Modifier le contenu du dernier bloc.
                </p>
            </div>
        </div>
    </a>

    <!-- Modale -->
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
        <div class="modal modal-dialog-centered fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Modifier le contenu du dernier bloc</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateBlockBlack">
                            <div class="form-group my-2">
                                <label for="title">Titre</label>
                                <input id="title" wire:model="title" class="form-control"></input>
                                @error('title')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="description">Description</label>
                                <textarea id="description" wire:model="description" class="form-control" rows="4"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                    <span wire:loading.remove>
                                        <i class="fas fa-save me-2"></i> Enregistrer
                                    </span>
                                    <span wire:loading>
                                        <i class="fas fa-spinner fa-spin me-2"></i> Enregistrement...
                                    </span>
                                </button>
                                <button class="btn btn-secondary" wire:click="closeModal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
