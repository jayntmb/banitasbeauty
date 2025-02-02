<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-image fa-3x mb-3 text-primary"></i>
                <h5 class="card-title">Bloc Intro</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Modifier le contenu du bloc intro.
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
                        <h5 class="modal-title">Modifier le bloc intro</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updateBlockIntro">
                            <!-- Phrase1 -->
                            <div class="form-group my-2">
                                <label for="phrase1">Phrase 1</label>
                                <input type="text" id="phrase1" wire:model="phrase1" class="form-control">
                                @error('phrase1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phrase2 -->
                            <div class="form-group my-2">
                                <label for="phrase2">Phrase 2</label>
                                <input type="text" id="phrase2" wire:model="phrase2" class="form-control">
                                @error('phrase2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phrase3 -->
                            <div class="form-group my-2">
                                <label for="phrase3">Phrase 3</label>
                                <input type="text" id="phrase3" wire:model="phrase3" class="form-control">
                                @error('phrase3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phrase4 -->
                            <div class="form-group my-2">
                                <label for="phrase4">Phrase 4</label>
                                <input type="text" id="phrase4" wire:model="phrase4" class="form-control">
                                @error('phrase4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Image 1 -->
                            <div class="form-group my-2">
                                <label for="newImage1">Image 1</label>
                                <div class="input-group">
                                    <input type="file" id="newImage1" wire:model="newImage1" class="form-control">
                                    @error('newImage1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($newImage1 && !in_array($newImage1->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newImage1 && in_array($newImage1->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage1->temporaryUrl() }}" alt="Nouvelle image"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image1)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('storage/' . $image1) }}" alt="Image actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Video 1 -->
                            <div class="form-group my-2">
                                <label for="newVideo1">Video 1</label>
                                <div class="input-group">
                                    <input type="file" id="newVideo1" wire:model="newVideo1" class="form-control">
                                    @error('newVideo1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newVideo1">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>

                                @if ($newVideo1 && !in_array($newVideo1->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newVideo1 && in_array($newVideo1->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle video -->
                                    <video src="{{ $newVideo1->temporaryUrl() }}" alt="Nouvelle video"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
                                @elseif ($video1)
                                    <!-- Aperçu de la video actuelle -->
                                    <video src="{{ asset('storage/' . $video1) }}" alt="video actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
                                @endif
                            </div>

                            <!-- Image 2 -->
                            <div class="form-group my-2">
                                <label for="newImage2">Image 2</label>
                                <div class="input-group">
                                    <input type="file" id="newImage2" wire:model="newImage2" class="form-control">
                                    @error('newImage2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newImage2">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>

                                @if ($newImage2 && !in_array($newImage2->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newImage2 && in_array($newImage2->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage2->temporaryUrl() }}" alt="Nouvelle image"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image2)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('storage/' . $image2) }}" alt="Image actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Video 2 -->
                            <div class="form-group my-2">
                                <label for="newVideo2">Video 2</label>
                                <div class="input-group">
                                    <input type="file" id="newVideo2" wire:model="newVideo2"
                                        class="form-control">
                                    @error('newVideo2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newVideo2">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>

                                @if ($newVideo2 && !in_array($newVideo2->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newVideo2 && in_array($newVideo2->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle video -->
                                    <video src="{{ $newVideo2->temporaryUrl() }}" alt="Nouvelle video"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
                                @elseif ($video2)
                                    <!-- Aperçu de la video actuelle -->
                                    <video src="{{ asset('storage/' . $video2) }}" alt="Video actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
                                @endif
                            </div>

                            <!-- Image 3 -->
                            <div class="form-group my-2">
                                <label for="newImage3">Image 3</label>
                                <div class="input-group">
                                    <input type="file" id="newImage3" wire:model="newImage3"
                                        class="form-control">
                                    @error('newImage3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newImage3">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>

                                @if ($newImage3 && !in_array($newImage3->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newImage3 && in_array($newImage3->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle image -->
                                    <img src="{{ $newImage3->temporaryUrl() }}" alt="Nouvelle image"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @elseif ($image3)
                                    <!-- Aperçu de l'image actuelle -->
                                    <img src="{{ asset('storage/' . $image3) }}" alt="Image actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Video 3 -->
                            <div class="form-group my-2">
                                <label for="newVideo3">Video 3</label>
                                <div class="input-group">
                                    <input type="file" id="newVideo3" wire:model="newVideo3"
                                        class="form-control">
                                    @error('newVideo3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group-text" wire:loading wire:target="newVideo1">
                                        <i class="fas fa-spinner fa-spin"></i> Uploading...
                                    </div>
                                </div>

                                @if ($newVideo3 && !in_array($newVideo3->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <span class="text-danger fs-6">Ce format de fichier ne peut pas être
                                        prévisualisé.</span>
                                @elseif ($newVideo3 && in_array($newVideo3->extension(), config('livewire.temporary_file_upload.preview_mimes')))
                                    <!-- Aperçu de la nouvelle video -->
                                    <video src="{{ $newVideo3->temporaryUrl() }}" alt="Nouvelle video"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
                                @elseif ($video3)
                                    <!-- Aperçu de la video actuelle -->
                                    <video src="{{ asset('storage/' . $video3) }}" alt="Video actuelle"
                                        class="img-fluid mt-2" style="max-width: 200px;" autoplay muted playisline loop></video>
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
