<div>
    <div class="col-lg-12">
        <div class="row justify-content-center g-3">
            <div class="col-lg-8 col-xl-8 col-xxl-8">
                <div class="card wow mb-4 py-3 px-3">
                    <div class="card-body p-2 p-sm-3">
                        <div class="row g-3">
                            <div class="col-lg-8 d-flex align-items-center justify-content-end">
                                <input type="text" class="search-input form-control form-control-sm form-control-bg"
                                    placeholder="Recherche">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-option btn-fliter d-flex align-items-center justify-content-end"
                                        style="font-size: 14px;" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Filtres
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <div class="dropdown-item list-item" wire:key="{{ $category->id }}">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="{{ $category->libelle }}" name="{{ $category->libelle }}"
                                                        wire:model.live="filters.categories.{{ $category->id }}" />
                                                    <label
                                                        for="{{ $category->libelle }}">{{ $category->libelle }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="col-lg-4 justify-content-start justify-content-sm-end d-flex align-items-center">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Nouveau produit</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <h4>Tous les produits</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-3 initialProductsContainer">
                                    @if ($produits->count() == 0)
                                        <div class="row-12 content-center">
                                            <h3 class="text-center mb-4"> Aucun produit pour cette catégorie</h3>
                                        </div>
                                    @endif
                                    @foreach ($produits as $key => $produit)
                                        <div class="col-lg-4 col-xl-4 col-xxl-3 col-md-6 col-sm-6 col-6">
                                            <div class="card-produit position-relative" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvas-produit_{{ $produit->id }}"
                                                aria-controls="offcanvasRight">
                                                <!-- Badge pour la promotion ou l'arrivage -->
                                                @if ($produit->is_promo)
                                                    <div
                                                        class="badge-promo position-absolute top-0 start-0 bg-danger text-white px-2 py-1">
                                                        @if ($produit->promo_type === 'pourcentage' && $produit->promo_value)
                                                            -{{ $produit->promo_value }}%
                                                        @else
                                                            Promo
                                                        @endif
                                                    </div>
                                                @elseif ($produit->is_arrivage)
                                                    <div
                                                        class="badge-arrivage position-absolute top-0 start-0 bg-primary text-white px-2 py-1">
                                                        Arrivage
                                                    </div>
                                                @endif

                                                <!-- Image du produit -->
                                                <div class="block-img-prod">
                                                    <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                        alt="{{ $produit->nom }}">
                                                </div>

                                                <!-- Nom et prix du produit -->
                                                <div class="content-card text-center">
                                                    <h4>{{ $produit->nom }}</h4>

                                                    @if ($produit->is_promo && $produit->promo_type === 'pourcentage' && $produit->promo_value)
                                                        <!-- Prix avec pourcentage -->
                                                        @php
                                                            $promoPrice =
                                                                $produit->prix * (1 - $produit->promo_value / 100);
                                                        @endphp
                                                        <div class="prices">
                                                            <span
                                                                class="old-price text-muted text-decoration-line-through">
                                                                ${{ number_format($produit->prix, 2, ',', ' ') }}

                                                            </span>
                                                            <span class="promo-price text-danger fw-bold">
                                                                ${{ number_format($promoPrice, 2, ',', ' ') }}
                                                            </span>
                                                        </div>
                                                    @elseif ($produit->is_promo && $produit->promo_type === 'fixe' && $produit->promo_value)
                                                        <!-- Prix avec prix fixe -->
                                                        <div class="prices">
                                                            <span
                                                                class="old-price text-muted text-decoration-line-through">
                                                                ${{ number_format($produit->prix, 2, ',', ' ') }}
                                                            </span>
                                                            <span class="promo-price text-danger fw-bold">
                                                                ${{ number_format($produit->promo_value, 2, ',', ' ') }}
                                                            </span>
                                                        </div>
                                                    @else
                                                        <!-- Prix normal -->
                                                        <div class="prices">
                                                            <span class="normal-price fw-bold">
                                                                ${{ number_format($produit->prix, 2, ',', ' ') }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    <div class="justify-content-center">
                                        {{ $produits->links('pagination::bootstrap-5') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-xxl-4">
                <!-- Ajout d'une nouvelle catégorie de produits -->
                <div class="card mb-3 py-3 px-3">
                    <div class="card-body p-2 p-sm-3">
                        <h4>Ajouter une catégorie</h4>
                        <form action="{{ route('admin.categories.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row g-3">
                                <div class="col-lg-12">
                                    <label class="mb-2">Libellé</label>
                                    <input required type="text" name="nom" class="form-control form-control-sm"
                                        placeholder="Nom de la catégorie">
                                </div>
                                <div class="col-12">
                                    <label for="" class="mb-2">Image</label>
                                    <div class="block-file">
                                        <label for="file-upload-sm">
                                            <input name="image" type="file" id="file-upload-sm" class="file-input"
                                                accept="image/*">
                                            <i class="fas fa-upload"></i>
                                            <span>Cliquez pour choisir une image</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="statut" class="mb-2">Statut</label>
                                    <select name="statut_id" name="state" id="statut"
                                        class="form-control select-form form-control-sm">
                                        <option value="" disabled> Selectionnez </option>
                                        <option value="1" selected> Active </option>
                                        <option value="2"> Inactive </option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary mt-2 w-100 py-3" type="submit">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Affichage de la liste des categories de produits -->
                <div class="card py-3 px-3">
                    <div class="card-body p-2 p-sm-3">
                        <h4>Liste des catégories</h4>
                        <div class="content-block">
                            <div class="block-all-message-sm">
                                @foreach ($categories as $categorie)
                                    <div class="message-sm row">
                                        <div class="col-lg-10 d-flex col-8">
                                            <div class="avatar-user">
                                                <img src="{{ asset('assets/images/categories/' . $categorie->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="content-message-sm w-100">
                                                <div class="d-flex align-items-center">
                                                    <div class="block-content">
                                                        <h5>{{ $categorie->libelle }}</h5>
                                                        <span class="time">{{ $categorie->created_at }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-end ms-auto col-4">
                                            <div class="dropdown">
                                                <button class="btn btn-option" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-categorie-{{ $categorie->id }}"
                                                            class="btn me-2" style="font-size: 14px">Modifier</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-categorie-{{ $categorie->id }}"
                                                            class="btn me-2" style="font-size: 14px">Supprimer</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($produits as $key => $produit)
        <!-- Modal pour la modification d'un produit -->
        <div class="modal fade" id="modal-edit_{{ $produit->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-lg-2">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Modifier le produit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input required type="hidden" name="produit_id" value="{{ $produit->id }}">
                            <div class="form-group row g-3">
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="" class="mb-2">Nom produit</label>
                                            <input required type="text" name="nom"
                                                value="{{ $produit->nom }}" class="form-control"
                                                placeholder="Nom du produit">
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="mb-2">Prix</label>
                                            <input required type="text" name="prix"
                                                value="{{ $produit->prix }}" class="form-control"
                                                placeholder="Combien coûte le produit ?">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="category" class="mb-2">Catégorie</label>
                                            <select name="categorie_id" id="category"
                                                class="form-control select-form form-control-sm">
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}"
                                                        {{ $produit->categorie?->id === $categorie->id ? 'selected' : '' }}>
                                                        {{ $categorie->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="category" class="mb-2">Description</label>
                                            <textarea name="description" id="" cols="30" rows="4" class="form-control"
                                                placeholder="Description">{{ $produit->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div id="carouselExampleIndicators-{{ $key }}"
                                                class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @if ($produit->first_image)
                                                        <div class="carousel-item active">
                                                            <div class="block-img-edit">
                                                                <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                                    alt="Image 1">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($produit->second_image)
                                                        <div class="carousel-item">
                                                            <div class="block-img-edit">
                                                                <img src="{{ asset('assets/images/produits/' . $produit->second_image) }}"
                                                                    alt="Image 2">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($produit->third_image)
                                                        <div class="carousel-item">
                                                            <div class="block-img-edit">
                                                                <img src="{{ asset('assets/images/produits/' . $produit->third_image) }}"
                                                                    alt="Image 3">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if ($produit->first_image || $produit->second_image || $produit->third_image)
                                                    <button class="carousel-control-prev btn-carousel" type="button"
                                                        data-bs-target="#carouselExampleIndicators-{{ $key }}"
                                                        data-bs-slide="prev">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </button>
                                                    <button class="carousel-control-next btn-carousel" type="button"
                                                        data-bs-target="#carouselExampleIndicators-{{ $key }}"
                                                        data-bs-slide="next">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </button>
                                                @endif
                                            </div>

                                            <label for="" class="mb-2">Image</label>
                                            <div class="block-file">
                                                <label for="file-upload-sm-{{ $produit->id }}">
                                                    <input name="images[]" type="file"
                                                        id="file-upload-sm-{{ $produit->id }}" class="file-input"
                                                        accept="image/*" multiple>
                                                    <i class="fas fa-upload"></i>
                                                    <span>Cliquez pour choisir une ou plusieurs images</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="mb-2">Video jointe</label>
                                            <div class="block-file">
                                                <label for="file-upload-pvideo-{{ $produit->id }}">
                                                    <input name="video" type="file"
                                                        value="{{ $produit->video }}"
                                                        id="file-upload-pvideo-{{ $produit->id }}"
                                                        class="file-input" accept="video/*">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Cliquez pour choisir une video</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="category" class="mb-2">Statut</label>
                                            <select name="statut_id" id="statut"
                                                class="form-control select-form form-control-sm">
                                                <option selected value="{{ $produit->statut?->id }}">
                                                    {{ $produit->statut?->libelle }}</option>
                                                <option value="1"> Actif </option>
                                                <option value="2"> Inactif </option>
                                                <option value="3"> En attente </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary mt-3" type="submit">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Affichage des details d'un produit -->
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-produit_{{ $produit->id }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="container-fluid mt-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleIndicators-{{ $produit->id }}" class="carousel slide"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if ($produit->first_image)
                                        <div class="carousel-item active">
                                            <div class="block-img-produit">
                                                <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                    alt="Image 1">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($produit->second_image)
                                        <div class="carousel-item">
                                            <div class="block-img-produit">
                                                <img src="{{ asset('assets/images/produits/' . $produit->second_image) }}"
                                                    alt="Image 2">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($produit->third_image)
                                        <div class="carousel-item">
                                            <div class="block-img-produit">
                                                <img src="{{ asset('assets/images/produits/' . $produit->third_image) }}"
                                                    alt="Image 3">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="carousel-indicators">
                                    @if ($produit->first_image)
                                        <button type="button"
                                            data-bs-target="#carouselExampleIndicators-{{ $produit->id }}"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1">
                                            <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                alt="Thumbnail 1">
                                        </button>
                                    @endif
                                    @if ($produit->second_image)
                                        <button type="button"
                                            data-bs-target="#carouselExampleIndicators-{{ $produit->id }}"
                                            data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="{{ asset('assets/images/produits/' . $produit->second_image) }}"
                                                alt="Thumbnail 2">
                                        </button>
                                    @endif
                                    @if ($produit->third_image)
                                        <button type="button"
                                            data-bs-target="#carouselExampleIndicators-{{ $produit->id }}"
                                            data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="{{ asset('assets/images/produits/' . $produit->third_image) }}"
                                                alt="Thumbnail 3">
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="badge active">{{ $produit->statut?->libelle }}</span>
                            <div class="block-info-user mt-2">
                                <h5>Nom du produit</h5>
                                <p>{{ $produit->nom }}</p>
                            </div>
                            <div class="block-info-user">
                                <h5>Catégorie</h5>
                                <p>{{ $produit->categorie?->libelle }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-md-4 px-3 mt-4" wire:ignore.self>
                    <ul class="nav nav-tabs nav-switch mt-3 mb-3 p-0 nav-product" id="myTab" role="tablist"
                        style="background: none;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane-{{ $key }}" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="video-tab" data-bs-toggle="tab"
                                data-bs-target="#video-tab-pane-{{ $key }}" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Vidéo</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane-{{ $key }}"
                            role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="block-info-user">
                                <div class="block-info-user">
                                    <p>{{ $produit->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-tab-pane-{{ $key }}" role="tabpanel"
                            aria-labelledby="video-tab" tabindex="0">
                            <div class="block-info-user">
                                @if ($produit->video)
                                    <video src="{{ asset('assets/images/produits/video/' . $produit->video) }}"
                                        controls></video>
                                @else
                                    <p>Aucune vidéo pour ce Produit</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-action-btn d-flex justify-content-end">
                <a href="#" data-bs-toggle="modal" data-bs-target="#delete_produit" class="btn me-2"
                    style="font-size: 14px">Suppimer</a>
                <a href="#" class="btn btn-primary " data-bs-toggle="modal"
                    data-bs-target="#modal-edit_{{ $produit->id }}">Modifier</a>
            </div>
        </div>

        <!-- Modal pour la suppression d'un produit -->
        <div class="modal fade" id="delete_produit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center content-text-modal">
                            <i class="fas fa-trash"></i>
                            <h4>Suppression</h4>
                            <p>Etes-vous sûr de vouloir supprimer ce produit ?</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-5 block-btns">
                            <a href="#" class="btn btn-default me-3" data-bs-dismiss="modal"
                                aria-label="Close">
                                Annuler
                            </a>
                            <a href="{{ route('admin.produits.delete', $produit->id) }}" class="btn btn-delete">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($categories as $key => $categorie)
        <!-- Modal pour la modification d'une categorie de produits -->
        <div class="modal fade" id="modal-edit-categorie-{{ $categorie->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Modifier la categorie
                            {{ $categorie->libelle }} </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.categories.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row g-3">
                                <div class="col-12">
                                    <label for="" class="mb-2">Images</label>
                                    <img class="rounded mx-auto d-block" style="width: 100px; height:100px;"
                                        src="{{ asset('assets/images/categories/' . $categorie->image) }}" />
                                    <div class="block-file">
                                        <label for="file-upload-ct-{{ $categorie->id }}">
                                            <input name="image" type="file"
                                                id="file-upload-ct-{{ $categorie->id }}" class="file-input"
                                                accept="image/*">
                                            <i class="fas fa-upload"></i>
                                            <span>Cliquez pour changer d'image</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="" class="mb-2">Nom categorie</label>
                                    <input required type="text" name="libelle" value="{{ $categorie->libelle }}"
                                        class="form-control" placeholder="Nom de la categorie">
                                </div>
                                <input required type="hidden" name="categorie_id" value="{{ $categorie->id }}">
                                <div class="col-lg-12">
                                    <label for="category" class="mb-2">Statut</label>
                                    <select name="statut_id" id="statut"
                                        class="form-control select-form form-control-sm">
                                        @foreach ([1 => 'Active', 2 => 'Inactive'] as $id => $libelle)
                                            <option value="{{ $id }}"
                                                {{ $categorie->statut?->id == $id ? 'selected' : '' }}>
                                                {{ $libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary mt-3" type="submit">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour la suppression d'une categorie de produits -->
        <div class="modal fade" id="modal-delete-categorie-{{ $categorie->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center content-text-modal">
                            <i class="fas fa-trash"></i>
                            <h4>Suppression</h4>
                            <p>Etes-vous sûr de vouloir supprimer cette catégorie ? Notez que cela supprimera tous les
                                produits qui y sont attachés !</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-5 block-btns">
                            <a href="#" class="btn btn-default me-3" data-bs-dismiss="modal"
                                aria-label="Close">Non, annuler</a>
                            <a href="{{ route('admin.categories.delete', $categorie->id) }}"
                                class="btn btn-delete">Oui, j'en suis sûr</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- <script>
    // Upload one File
    const newFichier = document.querySelectorAll('.file-input');
    newFichier.forEach(element => {
        element.addEventListener('change', function() {
            const fichier = this.files[0];
            const parent = $(this).parent();
            console.log(parent);
            if (fichier) {
                let namefile = fichier.name;
                if (namefile.length >= 12) {

                    let splitName = namefile.split('.');
                    namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];

                }
                const analyseur = new FileReader();
                analyseur.readAsDataURL(fichier);
                analyseur.addEventListener('load', function() {
                    $(parent).addClass('selected')
                    $(parent).find('span').text(namefile);
                })
            }
        })
    });

    // Upload more Files

    const tableFichier = document.querySelectorAll('.file-input-multiselect');
    console.log(tableFichier);
    tableFichier.forEach(element => {

        element.addEventListener('change', function() {
            const fichiers = this.files;
            const parent = $(this).parent();
            console.log(parent);
            if (fichiers) {
                for (let i = 0; i < fichiers.length; i++) {
                    const fichier = fichiers[i];
                    let namefile = fichier.name;
                    if (namefile.length >= 12) {
                        let splitName = namefile.split('.');
                        namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];
                    }
                    const analyseur = new FileReader();
                    analyseur.readAsDataURL(fichier);
                    analyseur.addEventListener('load', function() {
                        const selected = $(parent).find('.selected').eq(i);
                        $(selected).addClass('selected');
                        $(selected).find('span').text(namefile);
                    })
                }
            }
        })
    });
</script> --}}
