@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')
    @include('admin.layouts.partials.header.sidebar')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card wow mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 style="font-size: 20px;" class="mb-0">Tous les produits</h4>
                                        <div class="group-btn">
                                            {{-- <button class="btn btn-primary"><i class="fas fa-sort-alpha-up"></i></button>
                      <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button> --}}
                                        </div>
                                        {{-- <div class="form-group w-25 d-flex mb-0">
                        <input type="text" class="form-control" placeholder="Recherche ici..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button class="btn btn-primary btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <table class="table table-striped table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Catégorie</th>
                                                        <th scope="col">Détails</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Etat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($produits as $key => $produit)
                                                        <tr data-toggle="modal"
                                                            data-target="#ModalUser_{{ $key }}">
                                                            <td><img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                                    alt=""></td>
                                                            <td>{{ $produit->nom }}</td>
                                                            <td>{{ $produit->categorie->libelle }}</td>
                                                            <td>{{ Str::substr($produit->description, 0, 100) . '...' }}</td>
                                                            <td>{{ $produit->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                @if ($produit->statut_id == '1')
                                                                    <span class="badge badge-success">
                                                                    @elseif ($produit->statut_id == '2')
                                                                        <span class="badge badge-warning">
                                                                        @else
                                                                            <span class="badge badge-danger">
                                                                @endif
                                                                {{ $produit->statut->libelle }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card wow">
                                <div class="card-body">
                                    <h4 style="font-size: 20px;">
                                        {{ $article != null ? 'Modifier un produit' : 'Ajouter un produit' }} </h4>
                                    <hr>

                                    <form method="post" action="{{ route('admin.produits.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" placeholder="Entrez le nom du produit"
                                            name="produit_id" value="{{ $article != null ? $article->id : '' }}">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="nom">Nom du médicament</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Entrez le nom du produit" name="nom"
                                                    value="{{ $article != null ? $article->nom : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="categorie_id">Catégories</label>
                                                <select name="categorie_id" id="categorie_id" class="form-control">
                                                    @foreach ($categories as $categorie)
                                                        @if ($article == null)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $categorie->id }}"
                                                                {{ $article->categorie_id == $categorie->id ? 'selected' : '' }}>
                                                                {{ $categorie->libelle }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="description">Description du produit</label>
                                                <textarea name="description" id="description" class="form-control" placeholder="Entrez la description du produit">{{ $article != null ? $article->description : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="posologie">Posologie du produit</label>
                                                <textarea name="posologie" id="posologie" class="form-control" placeholder="Entrez la posologie du produit">{{ $article != null ? $article->posologie : '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="statut">Statut</label>
                                                <select name="statut_id" id="statut" class="form-control">
                                                    <option value="1"
                                                        {{ $article != null && $article->statut_id == '1' ? 'selected' : '' }}>
                                                        Actif </option>
                                                    <option value="2"
                                                        {{ $article != null && $article->statut_id == '2' ? 'selected' : '' }}>
                                                        Inactif </option>
                                                    <option value="3"
                                                        {{ $article != null && $article->statut_id == '3' ? 'selected' : '' }}>
                                                        En attente </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="category">Image</label>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="file" name="images" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <button class="btn btn-primary w-50">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($produits as $key => $produit)
        <div class="modal fade" id="ModalUser_{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Détails du produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body detail-act">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="text-left">
                                    <h4><span>{{ $produit->nom }}</span></h4>
                                    <div class="date">
                                        <i class="fas fa-calendar mr-2"></i> {{ $produit->created_at->format('d-m-Y') }}
                                    </div>
                                    <hr>
                                    <div class="">
                                        {{ $produit->categorie->libelle }}
                                    </div>
                                    <hr>
                                    <p>
                                        Description :<br />
                                        {{ $produit->description }}
                                    </p>
                                    <hr>
                                    <p>
                                        Indications :<br />
                                        {{ $produit->posologie }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer bg-white pl-0 d-flex justify-content-between">
                                <div class="custom-control custom-switch">
                                    <a href="{{ route('admin.produits.edit', [$produit->id]) }}"
                                        class="btn btn-default btn-delete">Modifier le produit</a>
                                </div>
                                <div class="group-btn">
                                    <a href="{{ route('admin.produits.delete', [$produit->id]) }}"
                                        class="btn btn-default btn-delete">Supprimer le produit</a>
                                </div>
                            </div>
                            <div class="sm-badge">
                                <div class="icon-sm">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="text-left">
                                    <span>Voulez-vous vraiment supprimer ?</span>
                                    <button class="btn btn-default btn-sm text-success"><i class="fas fa-check"></i>
                                        Oui</button>
                                    <button class="btn btn-default btn-sm text-danger btn-no"><i class="fas fa-times"></i>
                                        Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
@endsection
