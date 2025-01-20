@extends('admin.layouts.master')

@section('body')
    @include('admin.layouts.partials.header.sidebar')

    <div class="banner-sm">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-left text-white">
                        <h2>Produits</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @livewire('admin-produits')
            </div>
        </div>
    </div>

    <!-- Modal pour l'ajout d'un nouveau produit -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-2">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Ajouter un produit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane fade show active" id="medicament" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row g-3">
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="nom" class="mb-2">Nom produit</label>
                                            <input id="nom" type="text" name="nom"
                                                class="form-control text-capitalize" placeholder="Donnez un nom au produit"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="prix" class="mb-2">Prix</label>
                                            <input id="prix" type="text" name="prix"
                                                class="form-control text-capitalize"
                                                placeholder="Combien coûte le produit ?" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="category" class="mb-2">Catégorie</label>
                                            <select name="categorie_id" id="category"
                                                class="form-control select-form form-control-sm" required>
                                                <option selected value="" disabled> Cliquez pour choisir... </option>

                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="statut" class="mb-2">Statut</label>
                                            <select name="statut_id" id="statut"
                                                class="form-control select-form form-control-sm">
                                                <option selected value="" disabled> Cliquez pour choisir... </option>
                                                <option value="1"> Disponible </option>
                                                <option value="2"> Non disponible </option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="description" class="mb-2">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="" class="mb-2">Images</label>
                                            <div class="block-file">
                                                <label for="file-upload-med-1">
                                                    <input name="images[]" type="file" id="file-upload-med-1"
                                                        class="file-input" accept="image/*" required multiple>
                                                    <i class="fas fa-upload"></i>
                                                    <span>Cliquez pour choisir des images</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="" class="mb-2">Joindre une video </label>
                                            <div class="block-file">
                                                <label for="file-upload-med-3">
                                                    <input name="video" type="file" id="file-upload-med-3"
                                                        class="file-input" accept=".mp4">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Cliquez pour choisir une video</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="is_promo"
                                                    id="checkBoxPromo">
                                                <label class="form-check-label" for="checkBoxPromo">
                                                    C'est une promotion
                                                </label>
                                            </div>
                                        </div>

                                        <div class="promoDetails" style="display: none;">
                                            <h5 class="">Détails de la
                                                promotion</h5>
                                            <div class="mb-3">
                                                <label for="promoType" class="form-label">Type de
                                                    promotion</label>
                                                <select class="form-control select-form form-control-sm" id="promoType"
                                                    name="promo_type">
                                                    <option selected value="" disabled> Cliquez pour choisir...
                                                    </option>
                                                    <option value="pourcentage">Pourcentage</option>
                                                    <option value="fixe">Prix fixe</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="promoValue" class="form-label">Valeur de la
                                                    promotion</label>
                                                <input type="number" class="form-control" id="promoValue"
                                                    name="promo_value" min="0"
                                                    placeholder="Entrez une valeur">
                                            </div>
                                            <div class="mb-3">
                                                <label for="startDate" class="form-label">Date et heure de
                                                    début</label>
                                                <input type="datetime-local" class="form-control" id="startDate"
                                                    name="promo_start_date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="endDate" class="form-label">Date et heure de
                                                    fin</label>
                                                <input type="datetime-local" class="form-control" id="endDate"
                                                    name="promo_end_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_arrivage"
                                                id="checkboxArrivage">
                                            <label class="form-check-label" for="checkboxArrivage">
                                                C'est un arrivage
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary mt-3" type="submit">Ajouter</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checkBoxPromo = document.getElementById('checkBoxPromo');
            let promoDetails = document.querySelector('.promoDetails');
            let promoType = document.getElementById('promoType');
            let promoValue = document.getElementById('promoValue');

            checkBoxPromo.addEventListener('change', function() {
                if (checkBoxPromo.checked) {
                    promoDetails.style.display = 'block';
                    promoType.setAttribute('required', true);
                    promoValue.setAttribute('required', true);
                    document.getElementById('startDate').setAttribute('required', true);
                    document.getElementById('endDate').setAttribute('required', true);
                } else {
                    promoDetails.style.display = 'none';
                    promoType.removeAttribute('required');
                    promoValue.removeAttribute('required');
                    document.getElementById('startDate').removeAttribute('required');
                    document.getElementById('endDate').removeAttribute('required');
                }
            });

            if (promoType) {
                promoType.addEventListener('change', function() {
                    if (promoType.value === 'pourcentage') {
                        promoValue.setAttribute('max', 100);
                        promoValue.setAttribute('placeholder', 'Entrez un pourcentage');
                    } else {
                        promoValue.removeAttribute('max');
                        promoValue.setAttribute('placeholder', 'Entrez un prix fixe');
                    }
                });
            }
        });
    </script>
@endpush
